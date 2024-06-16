<!-- resources/views/citas/usuario/citasuser.blade.php -->

@extends('layouts.dashboard')

@section('title', 'Mis Citas')

@section('content')
<div class="min-h-screen flex flex-col items-center bg-gray-100 p-4">
    <div class="w-full max-w-6xl">
        <h1 class="text-4xl font-bold text-purple-700 text-center mb-8">Mis Citas</h1>
        
        <!-- Botón para agendar una nueva cita -->
        <div class="text-center mb-6">
            <a href="{{ url('/schedule-appointment') }}" class="bg-purple-500 text-white py-2 px-4 rounded-full hover:bg-purple-600 transition duration-300 shadow-md">
                Agendar Nueva Cita
            </a>
        </div>

        <!-- Calendario -->
        <div x-data="calendarApp()" x-init="initCalendar" class="bg-white rounded-lg shadow-lg p-4 sm:p-6">
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
                    <div @click="openModal(date)" class="relative p-2 sm:p-2 border rounded-lg flex items-center justify-center h-20 sm:h-auto cursor-pointer" 
                         :class="{'bg-purple-200': isToday(date), 'bg-gray-100': !isToday(date)}">
                        <span class="absolute top-0 right-0 mt-1 mr-1 text-xs sm:text-sm" x-text="date"></span>
                        <!-- Marcar el día con cita en dispositivos móviles -->
                        <template x-if="getAppointments(date).length > 0">
                            <div class="sm:hidden bg-purple-500 w-4 h-4 rounded-full"></div>
                        </template>
                        <!-- Mostrar detalles de la cita solo en pantallas más grandes -->
                        <div class="hidden sm:block mt-6 w-full">
                            <template x-for="appointment in getAppointments(date)" :key="appointment.id">
                                <div class="bg-white shadow-md rounded-lg p-2 mb-2 text-xs sm:text-sm">
                                    <p class="font-semibold" x-text="appointment.time"></p>
                                    <p x-text="appointment.doctor"></p>
                                    <p x-text="appointment.specialty"></p>
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
    </div>
</div>

<!-- Modal -->
<div x-show="open" class="fixed inset-0 flex items-center justify-center z-50" style="display: none;">
    <div class="absolute inset-0 bg-gray-900 opacity-50" @click="open = false"></div>
    <div class="bg-white rounded-lg shadow-lg p-6 z-10">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-xl font-semibold text-purple-700">Citas del día <span x-text="date"></span></h2>
            <button @click="open = false" class="text-gray-500 hover:text-gray-700">&times;</button>
        </div>
        <template x-if="appointments.length === 0">
            <p class="text-gray-600">No hay citas para este día.</p>
        </template>
        <template x-for="appointment in appointments" :key="appointment.id">
            <div class="bg-white shadow-md rounded-lg p-2 mb-2 text-sm">
                <p class="font-semibold" x-text="appointment.time"></p>
                <p x-text="appointment.doctor"></p>
                <p x-text="appointment.specialty"></p>
                <div class="flex justify-between mt-2">
                    <a href="#" class="text-blue-500 hover:underline">Ver</a>
                    <a href="#" class="text-red-500 hover:underline">Cancelar</a>
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
            appointments: [
                { id: 1, date: 20, time: '10:00 AM', doctor: 'Dr. Juan Pérez', specialty: 'Cardiología' },
                { id: 2, date: 22, time: '11:00 AM', doctor: 'Dra. María López', specialty: 'Dermatología' }
            ],
            initCalendar() {
                let now = new Date();
                this.month = now.getMonth();
                this.year = now.getFullYear();
                this.getDaysInMonth();
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
                return this.appointments.filter(appointment => appointment.date === date);
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
            },
            openModal(date) {
                this.open = true;
                this.date = date;
                this.appointments = this.getAppointments(date);
            }
        };
    }
</script>
@endsection
