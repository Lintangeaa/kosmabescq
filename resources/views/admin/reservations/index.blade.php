<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="text-2xl font-bold leading-tight text-gray-800">
                {{ __('Daftar Reservasi Kos') }}
            </h2>
            <div class="flex gap-4 items-center">
                <button id="sendNotification" onclick="sendNotification()" class="px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-md shadow-sm transition-colors hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                    <span class="inline-flex items-center">
                        <span id="bulkNotifyButtonText">Kirim Notifikasi</span>
                        <span id="bulkNotifySpinner" class="hidden ml-2">
                            <svg class="animate-spin h-4 w-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                        </span>
                    </span>
                </button>
                <div class="relative">
                    <input type="text" id="searchInput" placeholder="Cari reservasi..."
                        class="px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    <svg class="absolute top-3 right-3 w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>
            </div>
        </div>
    </x-slot>

    <div class="p-6 space-y-6">
        <!-- Status Summary Cards with Legend -->
        <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-4">
            <!-- Menunggu Pembayaran -->
            <div class="p-6 bg-yellow-50 rounded-lg border border-yellow-200 shadow-sm transition-all hover:shadow-md">
                <div class="flex justify-between items-center mb-4">
                    <div>
                        <div class="flex gap-2 items-center">
                            <span class="w-3 h-3 bg-yellow-500 rounded-full"></span>
                            <p class="text-sm font-medium text-yellow-600">Menunggu Pembayaran</p>
                        </div>
                        <h3 class="mt-2 text-2xl font-bold text-yellow-700" id="pendingCount">0</h3>
                    </div>
                    <div class="p-3 bg-yellow-100 rounded-full">
                        <svg class="w-6 h-6 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                </div>
                <p class="text-sm text-gray-600">Reservasi sedang dalam proses dan menunggu pembayaran dari customer.</p>
            </div>

            <!-- Dibayar -->
            <div class="p-6 bg-blue-50 rounded-lg border border-blue-200 shadow-sm transition-all hover:shadow-md">
                <div class="flex justify-between items-center mb-4">
                    <div>
                        <div class="flex gap-2 items-center">
                            <span class="w-3 h-3 bg-blue-500 rounded-full"></span>
                            <p class="text-sm font-medium text-blue-600">Dibayar</p>
                        </div>
                        <h3 class="mt-2 text-2xl font-bold text-blue-700" id="paidCount">0</h3>
                    </div>
                    <div class="p-3 bg-blue-100 rounded-full">
                        <svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                </div>
                <p class="text-sm text-gray-600">Pembayaran sudah diterima, tetapi reservasi belum selesai.</p>
            </div>

            <!-- Selesai -->
            <div class="p-6 bg-green-50 rounded-lg border border-green-200 shadow-sm transition-all hover:shadow-md">
                <div class="flex justify-between items-center mb-4">
                    <div>
                        <div class="flex gap-2 items-center">
                            <span class="w-3 h-3 bg-green-500 rounded-full"></span>
                            <p class="text-sm font-medium text-green-600">Selesai</p>
                        </div>
                        <h3 class="mt-2 text-2xl font-bold text-green-700" id="completedCount">0</h3>
                    </div>
                    <div class="p-3 bg-green-100 rounded-full">
                        <svg class="w-6 h-6 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                    </div>
                </div>
                <p class="text-sm text-gray-600">Semua proses selesai dan customer sudah menempati kost.</p>
            </div>

            <!-- Dibatalkan -->
            <div class="p-6 bg-red-50 rounded-lg border border-red-200 shadow-sm transition-all hover:shadow-md">
                <div class="flex justify-between items-center mb-4">
                    <div>
                        <div class="flex gap-2 items-center">
                            <span class="w-3 h-3 bg-red-500 rounded-full"></span>
                            <p class="text-sm font-medium text-red-600">Dibatalkan</p>
                        </div>
                        <h3 class="mt-2 text-2xl font-bold text-red-700" id="canceledCount">0</h3>
                    </div>
                    <div class="p-3 bg-red-100 rounded-full">
                        <svg class="w-6 h-6 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </div>
                </div>
                <p class="text-sm text-gray-600">Reservasi dibatalkan dan tidak akan dilanjutkan.</p>
            </div>
        </div>

        <!-- Modal untuk detail reservasi -->
        <div id="reservationModal" class="hidden overflow-y-auto fixed inset-0 z-50">
            <div class="flex justify-center items-center px-4 min-h-screen">
                <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
                <div class="relative z-50 w-full max-w-2xl opacity-0 transition-all duration-300 transform scale-95" id="modalContent">
                    <div class="overflow-hidden bg-white rounded-xl shadow-2xl">
                        <div class="px-6 py-4 bg-gradient-to-r from-blue-500 to-blue-600">
                            <div class="flex justify-between items-center">
                                <h3 class="text-xl font-semibold text-white">Detail Reservasi</h3>
                                <button onclick="closeReservationModal()" class="text-white transition-colors hover:text-gray-200">
                                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <div class="p-6">
                            <div class="grid grid-cols-2 gap-6">
                                <div class="col-span-2">
                                    <div class="flex items-center space-x-2">
                                        <div id="statusIndicator" class="w-3 h-3 rounded-full"></div>
                                        <p id="modalStatus" class="text-lg font-semibold"></p>
                                    </div>
                                </div>
                                <div>
                                    <p class="text-sm font-medium text-gray-500">ID Reservasi</p>
                                    <p id="modalReservationId" class="text-base font-semibold text-gray-900"></p>
                                </div>
                                <div>
                                    <p class="text-sm font-medium text-gray-500">Nama Kost</p>
                                    <p id="modalKostName" class="text-base font-semibold text-gray-900"></p>
                                </div>
                                <div>
                                    <p class="text-sm font-medium text-gray-500">Nama Penyewa</p>
                                    <p id="modalUserName" class="text-base font-semibold text-gray-900"></p>
                                </div>
                                <div>
                                    <p class="text-sm font-medium text-gray-500">No HP</p>
                                    <p id="modalPhone" class="text-base font-semibold text-gray-900"></p>
                                </div>
                                <div class="col-span-2">
                                    <p class="text-sm font-medium text-gray-500">Alamat</p>
                                    <p id="modalAddress" class="text-base font-semibold text-gray-900"></p>
                                </div>
                                <div>
                                    <p class="text-sm font-medium text-gray-500">Total Bulan</p>
                                    <p id="modalTotal" class="text-base font-semibold text-gray-900"></p>
                                </div>
                                <div>
                                    <p class="text-sm font-medium text-gray-500">Total Pembayaran</p>
                                    <p id="modalPayment" class="text-base font-semibold text-gray-900"></p>
                                </div>
                                <div>
                                    <p class="text-sm font-medium text-gray-500">Tanggal Masuk</p>
                                    <p id="modalStartDate" class="text-base font-semibold text-gray-900"></p>
                                </div>
                                <div>
                                    <p class="text-sm font-medium text-gray-500">Tanggal Keluar</p>
                                    <p id="modalEndDate" class="text-base font-semibold text-gray-900"></p>
                                </div>
                                <div>
                                    <p class="text-sm font-medium text-gray-500">Status</p>
                                    <p id="modalStatus" class="text-base font-semibold text-gray-900"></p>
                                </div>
                                <div>
                                    <p class="text-sm font-medium text-gray-500">Status Email</p>
                                    <p id="modalEmailSent" class="text-base font-semibold text-gray-900"></p>
                                </div>
                            </div>
                        </div>
                        <div class="flex justify-between items-center px-6 py-4 bg-gray-50">
                            <div class="flex gap-2" id="actionButtons">
                                <form id="updateStatusForm" method="POST" class="flex gap-2">
                                    @csrf
                                    @method('PUT')
                                    <button type="button" onclick="updateStatus('Selesai')"
                                        class="px-4 py-2 text-sm font-medium text-white bg-green-600 rounded-md shadow-sm transition-colors hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
                                        Selesai
                                    </button>
                                    <button type="button" onclick="updateStatus('Dibatalkan')"
                                        class="px-4 py-2 text-sm font-medium text-white bg-red-600 rounded-md shadow-sm transition-colors hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2">
                                        Batalkan
                                    </button>
                                </form>
                                <button type="button" onclick="sendSpecificNotification()"
                                    class="px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-md shadow-sm transition-colors hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                                    <span class="inline-flex items-center">
                                        <span id="notifyButtonText">Kirim Pengingat</span>
                                        <span id="notifySpinner" class="hidden ml-2">
                                            <svg class="animate-spin h-4 w-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                            </svg>
                                        </span>
                                    </span>
                                </button>
                            </div>
                            <button type="button" onclick="closeReservationModal()"
                                class="px-4 py-2 text-sm font-medium text-gray-700 bg-white rounded-md border border-gray-300 shadow-sm transition-colors hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                                Tutup
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @if ($reservations->isEmpty())
            <div class="py-12 text-center">
                <div class="inline-flex justify-center items-center mb-4 w-16 h-16 bg-gray-100 rounded-full">
                    <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                    </svg>
                </div>
                <p class="mb-4 text-lg text-gray-600">Tidak ada reservasi untuk kos Anda.</p>
            </div>
        @else
            <div class="overflow-hidden bg-white rounded-xl border border-gray-200 shadow-sm">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">ID Reservasi</th>
                                <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Nama Kost</th>
                                <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Nama Penyewa</th>
                                <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Alamat</th>
                                <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">No HP</th>
                                <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Tanggal Masuk</th>
                                <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Tanggal Keluar</th>
                                <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Total Bulan</th>
                                <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Status</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200" id="reservationTableBody">
                            @foreach ($reservations as $reservation)
                                <tr class="transition-colors cursor-pointer hover:bg-gray-50"
                                    onclick="showReservationModal(
                                        '{{ $reservation->reservation_id }}',
                                        '{{ $reservation->kost->nama }}',
                                        '{{ $reservation->user->name }}',
                                        '{{ $reservation->alamat ?? 'Belum diisi' }}',
                                        '{{ $reservation->no_hp ?? 'Belum diisi' }}',
                                        '{{ $reservation->total }}',
                                        '{{ $reservation->tanggal_reservasi }}',
                                        '{{ $reservation->tanggal_keluar }}',
                                        '{{ $reservation->status }}',
                                        '{{ $reservation->total * $reservation->kost->harga }}',
                                        '{{ $reservation->email_sent }}'
                                    )">
                                    <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">{{ $reservation->reservation_id }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-900 whitespace-nowrap">{{ $reservation->kost->nama }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-900 whitespace-nowrap">{{ $reservation->user->name }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                                        <div class="max-w-xs">
                                            <p class="truncate">{{ $reservation->alamat ?? 'Belum diisi' }}</p>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">{{ $reservation->no_hp ?? 'Belum diisi' }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">{{ $reservation->tanggal_reservasi }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">{{ $reservation->tanggal_keluar }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">{{ floor($reservation->total) }} Bulan</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full
                                            {{ $reservation->status == 'Menunggu Pembayaran' ? 'bg-yellow-100 text-yellow-800' :
                                               ($reservation->status == 'Dibayar' ? 'bg-blue-100 text-blue-800' :
                                               ($reservation->status == 'Selesai' ? 'bg-green-100 text-green-800' :
                                               ($reservation->status == 'Dibatalkan' ? 'bg-red-100 text-red-800' : 'bg-gray-100 text-gray-800'))) }}">
                                            {{ $reservation->status }}
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif
    </div>

    <script>
        // Update status counts
        function updateStatusCounts() {
            const rows = document.querySelectorAll('#reservationTableBody tr');
            let pending = 0, paid = 0, completed = 0, canceled = 0;

            rows.forEach(row => {
                const status = row.querySelector('td:last-child span').textContent.trim();
                if (status === 'Menunggu Pembayaran') pending++;
                else if (status === 'Dibayar') paid++;
                else if (status === 'Selesai') completed++;
                else if (status === 'Dibatalkan') canceled++;
            });

            document.getElementById('pendingCount').textContent = pending;
            document.getElementById('paidCount').textContent = paid;
            document.getElementById('completedCount').textContent = completed;
            document.getElementById('canceledCount').textContent = canceled;
        }

        // Search functionality
        document.getElementById('searchInput').addEventListener('input', function(e) {
            const searchTerm = e.target.value.toLowerCase();
            const rows = document.querySelectorAll('#reservationTableBody tr');

            rows.forEach(row => {
                const text = row.textContent.toLowerCase();
                row.style.display = text.includes(searchTerm) ? '' : 'none';
            });
        });

        let currentReservationId = null;

        function showReservationModal(reservationId, kostName, userName, address, phone, total, startDate, endDate, status, payment, emailSent) {
            currentReservationId = reservationId;
            const modalContent = document.getElementById('modalContent');
            const statusIndicator = document.getElementById('statusIndicator');
            const actionButtons = document.getElementById('actionButtons');
            const notifyButton = actionButtons.querySelector('button[onclick="sendSpecificNotification()"]');

            // Set modal content
            document.getElementById('modalReservationId').textContent = reservationId;
            document.getElementById('modalKostName').textContent = kostName;
            document.getElementById('modalUserName').textContent = userName;
            document.getElementById('modalAddress').textContent = address;
            document.getElementById('modalPhone').textContent = phone;
            document.getElementById('modalTotal').textContent = Math.floor(total) + ' Bulan';
            document.getElementById('modalStartDate').textContent = startDate;
            document.getElementById('modalEndDate').textContent = endDate;
            document.getElementById('modalStatus').textContent = status;
            document.getElementById('modalPayment').textContent = 'Rp ' + new Intl.NumberFormat('id-ID').format(payment);
            document.getElementById('modalEmailSent').textContent = emailSent ? 'Sudah Dikirim' : 'Belum Dikirim';

            // Always show notification button for manual notifications
            notifyButton.classList.remove('hidden');

            // Hide status update buttons for completed or cancelled reservations
            const statusButtons = actionButtons.querySelector('form');
            if (status === 'Selesai' || status === 'Dibatalkan') {
                statusButtons.classList.add('hidden');
            } else {
                statusButtons.classList.remove('hidden');
            }

            // Set status indicator color
            const statusColors = {
                'Menunggu Pembayaran': 'bg-yellow-500',
                'Dibayar': 'bg-blue-500',
                'Selesai': 'bg-green-500',
                'Dibatalkan': 'bg-red-500'
            };
            statusIndicator.className = `w-3 h-3 rounded-full ${statusColors[status] || 'bg-gray-500'}`;

            // Show modal with animation
            document.getElementById('reservationModal').classList.remove('hidden');
            setTimeout(() => {
                modalContent.classList.remove('scale-95', 'opacity-0');
                modalContent.classList.add('scale-100', 'opacity-100');
            }, 10);
        }

        function closeReservationModal() {
            const modalContent = document.getElementById('modalContent');
            modalContent.classList.remove('scale-100', 'opacity-100');
            modalContent.classList.add('scale-95', 'opacity-0');
            setTimeout(() => {
                document.getElementById('reservationModal').classList.add('hidden');
            }, 300);
        }

        // Close modal when clicking outside
        document.getElementById('reservationModal').addEventListener('click', function(event) {
            if (event.target === this) {
                closeReservationModal();
            }
        });

        // Close modal when pressing ESC key
        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape') {
                closeReservationModal();
            }
        });

        // Initialize status counts when page loads
        document.addEventListener('DOMContentLoaded', updateStatusCounts);

        function updateStatus(newStatus) {
            if (!currentReservationId) return;

            if (!confirm(`Apakah Anda yakin ingin mengubah status reservasi menjadi ${newStatus}?`)) {
                return;
            }

            const form = document.getElementById('updateStatusForm');
            form.action = `/admin/reservations/${currentReservationId}/update-status`;

            const formData = new FormData(form);
            formData.append('status', newStatus);

            fetch(form.action, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
            .then(response => {
                if (!response.ok) throw new Error('Network response was not ok');
                window.location.reload();
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Terjadi kesalahan saat mengubah status reservasi.');
            });
        }

        function setLoading(isLoading, buttonId = 'notifyButtonText', spinnerId = 'notifySpinner') {
            const button = document.getElementById(buttonId);
            const spinner = document.getElementById(spinnerId);

            if (isLoading) {
                button.textContent = 'Mengirim...';
                spinner.classList.remove('hidden');
            } else {
                button.textContent = 'Kirim Pengingat';
                spinner.classList.add('hidden');
            }
        }

        function sendNotification() {
            setLoading(true, 'bulkNotifyButtonText', 'bulkNotifySpinner');
            fetch('{{ route("admin.reservations.notify") }}', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === 'success') {
                    alert(data.message);
                } else if (data.status === 'info') {
                    alert('Info: ' + data.message);
                } else {
                    alert('Gagal mengirim notifikasi: ' + data.message);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Terjadi kesalahan saat mengirim notifikasi');
            })
            .finally(() => {
                setLoading(false, 'bulkNotifyButtonText', 'bulkNotifySpinner');
            });
        }

        function sendSpecificNotification() {
            if (!currentReservationId) return;

            setLoading(true);
            fetch('{{ route("admin.reservations.notify") }}', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    reservation_id: currentReservationId
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === 'success') {
                    alert(data.message);
                    // Update the email sent status in the modal
                    document.getElementById('modalEmailSent').textContent = 'Sudah Dikirim';
                } else if (data.status === 'info') {
                    alert('Info: ' + data.message);
                } else {
                    alert('Gagal mengirim notifikasi: ' + data.message);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Terjadi kesalahan saat mengirim notifikasi');
            })
            .finally(() => {
                setLoading(false);
            });
        }
    </script>
</x-app-layout>
