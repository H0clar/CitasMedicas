@extends('layouts.dashboard')

@section('title', 'Mis Citas')

@section('content')
<div x-data="calendarApp()" x-init="initCalendar({{ $medicos->toJson() }})" class="min-h-screen flex flex-col items-center bg-gray-100 p-4">
    <div class="w-full max-w-6xl">
        <h1 class="text-4xl font-bold text-purple-700 text-center mb-8">Mis Citas</h1>

        <!-- Calendario -->
        <div class="bg-white rounded-lg shadow-lg p-4 sm:p-6">
            <div class="flex items-center justify-between mb-4">
                <button @click="prevMonth" class="text-purple-500 hover:text-purple-700">
                    &lt;
                </button>
                <h2 class="text-xl font-semibold text-purple-700" x-text="monthYear"></h2>
                <button @click="nextMonth" class="text-purple-500 hover:text-purple-700">
                    &gt;
                </button>
            </div>

            <div class="grid grid-cols-7 gap-2 sm:gap-4">
                <template x-for="day in daysOfWeek" :key="day">
                    <div class="text-center font-bold text-gray-600 text-xs sm:text-sm" x-text="day"></div>
                </template>

                <template x-for="day in blankDays" :key="day">
                    <div class="text-center"></div>
                </template>

                <template x-for="date in daysInMonth" :key="date">
                    <div class="relative p-2 sm:p-2 border rounded-lg flex items-center justify-center h-20 sm:h-auto cursor-pointer" 
                         :class="{'bg-purple-200': isToday(date), 'bg-gray-100': !isToday(date)}"
                         @click="openModal(date)">
                        <span class="absolute top-0 right-0 mt-1 mr-1 text-xs sm:text-sm" x-text="date"></span>
                        <template x-if="getAppointments(date).length > 0">
                            <div class="sm:hidden bg-purple-500 w-4 h-4 rounded-full"></div>
                        </template>
                        <div class="hidden sm:block mt-6 w-full">
                            <template x-for="appointment in getAppointments(date)" :key="appointment.id">
                                <div class="bg-white shadow-md rounded-lg p-2 mb-2 text-xs sm:text-sm">
                                    <p class="font-semibold" x-text="appointment.hora"></p>
                                    <p x-text="appointment.medico"></p>
                                    <p x-text="appointment.especialidad"></p>
                                    <div class="flex justify-between mt-2">
                                        <a href="#" class="text-blue-500 hover:underline">Ver</a>
                                        <a href="#" class="text-red-500 hover:underline">Cancelar</a>
                                    </div>
                                </div>
                            </template>
                        </div>
                    </div>
                </template>
            </div>
        </div>

        <!-- Modal -->
        <template x-if="showModal">
            <div class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
                <div class="bg-white rounded-lg shadow-lg w-full max-w-lg p-8">
                    <div class="flex justify-between items-center pb-4 border-b">
                        <h2 class="text-2xl font-bold text-purple-700">Agendar Nueva Cita</h2>
                        <button @click="showModal = false" class="text-gray-700 hover:text-gray-900 text-3xl">&times;</button>
                    </div>
                    <form class="space-y-6 pt-6" @submit.prevent="addAppointment">
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label for="date" class="block text-gray-700 font-medium">Fecha</label>
                                <input type="date" id="date" x-model="form.date" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-purple-300 focus:ring focus:ring-purple-200 focus:ring-opacity-50">
                            </div>
                            <div>
                                <label for="time" class="block text-gray-700 font-medium">Hora</label>
                                <select id="time" x-model="form.time" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-purple-300 focus:ring focus:ring-purple-200 focus:ring-opacity-50">
                                    <template x-for="horario in horariosDisponibles" :key="horario">
                                        <option :value="horario" x-text="horario"></option>
                                    </template>
                                </select>
                            </div>
                        </div>
                        <div>
                            <label for="doctor" class="block text-gray-700 font-medium">Doctor</label>
                            <select id="doctor" x-model="form.doctor" @change="cargarHorarios" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-purple-300 focus:ring focus:ring-purple-200 focus:ring-opacity-50">
                                <template x-for="medico in medicos" :key="medico.id">
                                    <option :value="medico.id" x-text="medico.nombre"></option>
                                </template>
                            </select>
                        </div>
                        <div>
                            <label for="specialty" class="block text-gray-700 font-medium">Especialidad</label>
                            <input type="text" id="specialty" x-model="form.specialty" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-purple-300 focus:ring focus:ring-purple-200 focus:ring-opacity-50" readonly>
                        </div>
                        <div class="flex justify-end pt-4 border-t">
                            <button @click="showModal = false" type="button" class="bg-gray-500 text-white py-2 px-4 rounded-md hover:bg-gray-600 transition duration-300 shadow-md">
                                Cancelar
                            </button>
                            <button type="submit" class="bg-purple-500 text-white py-2 px-4 rounded-md hover:bg-purple-600 transition duration-300 shadow-md ml-2">
                                Guardar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </template>
    </div>
</div>

<script>
function calendarApp() {
    return {
        month: '',
        year: '',
        daysOfWeek: ['Dom', 'Lun', 'Mar', 'Mie', 'Jue', 'Vie', 'Sab'],
        blankDays: [],
        daysInMonth: [],
        appointments: [],
        form: {
            date: '',
            time: '',
            doctor: '',
            specialty: ''
        },
        showModal: false,
        medicos: [],
        horariosDisponibles: [],
        selectedSpecialty: '',
        initCalendar(medicos) {
            this.medicos = medicos;
            let now = new Date();
            this.month = now.getMonth();
            this.year = now.getFullYear();
            this.getDaysInMonth();
            this.cargarCitas();
        },
        getDaysInMonth() {
            let daysInMonth = new Date(this.year, this.month + 1, 0).getDate();
            this.blankDays = Array.from({ length: new Date(this.year, this.month, 1).getDay() });
            this.daysInMonth = Array.from({ length: daysInMonth }, (_, i) => i + 1);
        },
        isToday(date) {
            const today = new Date();
            return date === today.getDate() && this.month === today.getMonth() && this.year === today.getFullYear();
        },
        getAppointments(date) {
            return this.appointments.filter(appointment => new Date(appointment.fecha).getDate() === date);
        },
        openModal(date) {
            this.form.date = `${this.year}-${String(this.month + 1).padStart(2, '0')}-${String(date).padStart(2, '0')}`;
            this.showModal = true;
        },
        cargarHorarios() {
            if (this.form.doctor) {
                const medico = this.medicos.find(m => m.id === parseInt(this.form.doctor));
                this.form.specialty = medico.especialidad;
                fetch(`/medicos/${this.form.doctor}/horarios`)
                    .then(response => response.json())
                    .then(data => {
                        this.horariosDisponibles = data.map(horario => horario.trim());
                    })
                    .catch(error => {
                        console.error('Error al cargar los horarios:', error);
                    });
            } else {
                this.horariosDisponibles = [];
            }
        },
        addAppointment() {
            const formData = {
                fecha: this.form.date,
                hora: this.form.time,
                medico_id: this.form.doctor,
                especialidad: this.form.specialty,
                descripcion: 'Cita médica con ' + this.form.doctor + ' - ' + this.form.specialty,
            };

            fetch('{{ route('citas.store') }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify(formData)
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    this.appointments.push({
                        id: data.cita.id,
                        fecha: data.cita.fecha,
                        hora: data.cita.hora,
                        medico: this.medicos.find(m => m.id === parseInt(data.cita.medico_id)).nombre,
                        especialidad: this.form.specialty
                    });
                    this.showModal = false;
                    this.getDaysInMonth();
                } else {
                    alert(data.message || 'Error al guardar la cita');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Error al guardar la cita');
            });
        },
        cargarCitas() {
            fetch('{{ route('citas.index') }}')
                .then(response => response.json())
                .then(data => {
                    this.appointments = data.map(cita => {
                        return {
                            id: cita.id,
                            fecha: cita.fecha,
                            hora: cita.hora,
                            medico: this.medicos.find(m => m.id === cita.medico_id).nombre,
                            especialidad: this.medicos.find(m => m.id === cita.medico_id).especialidad
                        };
                    });
                })
                .catch(error => {
                    console.error('Error al cargar las citas:', error);
                });
        },
        prevMonth() {
            this.month--;
            if (this.month < 0) {
                this.month = 11;
                this.year--;
            }
            this.getDaysInMonth();
        },
        nextMonth() {
            this.month++;
            if (this.month > 11) {
                this.month = 0;
                this.year++;
            }
            this.getDaysInMonth();
        },
        get monthYear() {
            return new Date(this.year, this.month).toLocaleString('default', { month: 'long', year: 'numeric' });
        }
    };
}
</script>
@endsection
