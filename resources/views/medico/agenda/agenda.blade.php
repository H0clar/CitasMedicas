@extends('medico.layouts.dashboard')

@section('title', 'Agenda Médica')

@section('content')
<section id="agenda" class="bg-gray-100 py-12 min-h-screen">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-4xl font-bold text-blue-600 mb-3">Agenda Médica</h2>
            <p class="text-gray-600 text-lg">Gestiona tus citas médicas de manera eficiente</p>
        </div>
        
        <!-- Controles de búsqueda y filtrado mejorados -->
        <div class="mb-10 flex flex-wrap gap-4 justify-center">
            <div class="relative flex-grow max-w-md">
                <input id="search" type="text" placeholder="Buscar por paciente o descripción" class="w-full px-4 py-3 pr-10 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-300">
                <span class="absolute right-3 top-3 text-gray-400">
                    <span class="iconify" data-icon="heroicons-outline:search"></span>
                </span>
            </div>
        </div>

        <div id="timeline" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 overflow-auto max-h-screen">
            <!-- Las citas se agregarán dinámicamente aquí -->
        </div>
    </div>
    
    <!-- Botones flotantes -->
    <div class="fixed bottom-8 right-8 flex flex-col items-center space-y-2">
        <button id="statusFilterButton" class="w-12 h-12 bg-blue-600 text-white rounded-full shadow-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 flex items-center justify-center">
            <span class="iconify" data-icon="heroicons-outline:filter"></span>
        </button>
        <button id="statusPendingButton" class="hidden w-10 h-10 bg-yellow-500 text-white rounded-full shadow-lg hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:ring-offset-2 flex items-center justify-center">
            <span class="iconify" data-icon="heroicons-outline:clock"></span>
        </button>
        <button id="statusConfirmedButton" class="hidden w-10 h-10 bg-green-500 text-white rounded-full shadow-lg hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 flex items-center justify-center">
            <span class="iconify" data-icon="heroicons-outline:check-circle"></span>
        </button>
        <button id="statusCancelledButton" class="hidden w-10 h-10 bg-red-500 text-white rounded-full shadow-lg hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 flex items-center justify-center">
            <span class="iconify" data-icon="heroicons-outline:x-circle"></span>
        </button>
        <button id="calendarButton" class="w-12 h-12 bg-gray-600 text-white rounded-full shadow-lg hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 flex items-center justify-center">
            <span class="iconify" data-icon="heroicons-outline:calendar"></span>
        </button>
        <input type="date" id="dateFilter" class="hidden px-4 py-3 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-300 bg-white">
    </div>
</section>

<script>
    // Array de citas de prueba
    const appointments = [
        {
            patient: "Juan Pérez",
            date: "2024-07-01",
            time: "10:00 AM",
            status: "pendiente",
            description: "Consulta general",
        },
        {
            patient: "María López",
            date: "2024-07-02",
            time: "11:00 AM",
            status: "confirmada",
            description: "Revisión dental",
        },
        {
            patient: "Carlos Ruiz",
            date: "2024-07-03",
            time: "09:30 AM",
            status: "cancelada",
            description: "Chequeo anual",
        },
        {
            patient: "Ana Martínez",
            date: "2024-07-04",
            time: "02:00 PM",
            status: "confirmada",
            description: "Consulta de pediatría",
        },
        {
            patient: "Luis Fernández",
            date: "2024-07-05",
            time: "03:30 PM",
            status: "pendiente",
            description: "Consulta de cardiología",
        }
    ];

    function renderAppointments(filteredAppointments = appointments) {
        const timeline = document.getElementById('timeline');
        timeline.innerHTML = '';

        filteredAppointments.forEach(appointment => {
            const appointmentDiv = document.createElement('div');
            appointmentDiv.className = 'bg-white rounded-xl shadow-lg overflow-hidden transition-all duration-300 hover:shadow-2xl transform hover:-translate-y-1';

            const statusColors = {
                pendiente: 'bg-yellow-500',
                confirmada: 'bg-green-500',
                cancelada: 'bg-red-500'
            };

            const content = `
                <div class="p-6" data-status="${appointment.status}">
                    <div class="flex justify-between items-center mb-4">
                        <span class="${statusColors[appointment.status]} text-white text-sm font-semibold px-3 py-1 rounded-full">
                            ${appointment.status.charAt(0).toUpperCase() + appointment.status.slice(1)}
                        </span>
                        <div class="text-gray-500 flex items-center">
                            <button class="p-1 hover:bg-gray-100 rounded-full transition-colors">
                                <span class="iconify" data-icon="heroicons-outline:pencil"></span>
                            </button>
                            <button class="p-1 hover:bg-gray-100 rounded-full transition-colors ml-2">
                                <span class="iconify" data-icon="heroicons-outline:trash"></span>
                            </button>
                        </div>
                    </div>
                    <div class="space-y-3">
                        <div class="flex items-center">
                            <span class="iconify text-blue-600 mr-3 text-xl" data-icon="heroicons-outline:user-circle"></span>
                            <span class="text-gray-800 font-semibold">${appointment.patient}</span>
                        </div>
                        <div class="flex items-center">
                            <span class="iconify text-blue-600 mr-3 text-xl" data-icon="heroicons-outline:calendar"></span>
                            <span class="text-gray-800">${appointment.date}</span>
                        </div>
                        <div class="flex items-center">
                            <span class="iconify text-blue-600 mr-3 text-xl" data-icon="heroicons-outline:clock"></span>
                            <span class="text-gray-800">${appointment.time}</span>
                        </div>
                    </div>
                    <p class="text-gray-600 mt-4">${appointment.description}</p>
                    <div class="mt-6 pt-4 border-t border-gray-200">
                        <h4 class="text-sm font-semibold text-gray-600 mb-2">Notas</h4>
                        <textarea class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-300" rows="2" placeholder="Añade notas aquí..."></textarea>
                        <button class="mt-2 flex items-center px-3 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-300 bg-white">
                            <span class="iconify text-blue-600 mr-2" data-icon="heroicons-outline:upload"></span>
                            Subir receta
                        </button>
                    </div>
                </div>
            `;

            appointmentDiv.innerHTML = content;
            timeline.appendChild(appointmentDiv);
        });
    }

    function filterTimeline() {
        const searchInput = document.getElementById('search').value.toLowerCase();
        const statusFilter = document.getElementById('statusFilter').value;
        const dateFilter = document.getElementById('dateFilter').value;

        const filteredAppointments = appointments.filter(appointment => {
            const matchesSearch = appointment.patient.toLowerCase().includes(searchInput) || appointment.description.toLowerCase().includes(searchInput);
            const matchesStatus = !statusFilter || appointment.status === statusFilter;
            const matchesDate = !dateFilter || appointment.date === dateFilter;

            return matchesSearch && matchesStatus && matchesDate;
        });

        renderAppointments(filteredAppointments);
    }

    document.getElementById('search').addEventListener('input', filterTimeline);
    document.getElementById('dateFilter').addEventListener('change', filterTimeline);

    // Botones flotantes para filtrar por estado
    const statusFilterButton = document.getElementById('statusFilterButton');
    const statusPendingButton = document.getElementById('statusPendingButton');
    const statusConfirmedButton = document.getElementById('statusConfirmedButton');
    const statusCancelledButton = document.getElementById('statusCancelledButton');
    const calendarButton = document.getElementById('calendarButton');
    const dateFilter = document.getElementById('dateFilter');

    statusFilterButton.addEventListener('click', () => {
        statusPendingButton.classList.toggle('hidden');
        statusConfirmedButton.classList.toggle('hidden');
        statusCancelledButton.classList.toggle('hidden');
    });

    statusPendingButton.addEventListener('click', () => {
        document.getElementById('statusFilter').value = 'pendiente';
        filterTimeline();
    });

    statusConfirmedButton.addEventListener('click', () => {
        document.getElementById('statusFilter').value = 'confirmada';
        filterTimeline();
    });

    statusCancelledButton.addEventListener('click', () => {
        document.getElementById('statusFilter').value = 'cancelada';
        filterTimeline();
    });

    calendarButton.addEventListener('click', () => {
        dateFilter.classList.toggle('hidden');
        dateFilter.focus();
    });

    document.addEventListener('DOMContentLoaded', () => {
        renderAppointments();
    });
</script>
<script src="https://code.iconify.design/2/2.1.1/iconify.min.js"></script>
@endsection
