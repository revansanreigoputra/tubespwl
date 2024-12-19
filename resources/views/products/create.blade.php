<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Produk</title>
    @vite('resources/css/app.css')

    <!-- Tailwind CSS for Modal -->
    <style>
        /* Modal Background */
        .modal-overlay {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.5);
            display: none;
            justify-content: center;
            align-items: center;
        }

        /* Modal Content */
        .modal-content {
            background-color: white;
            padding: 1.5rem;
            border-radius: 0.5rem;
            max-width: 400px;
            width: 100%;
        }
    </style>
</head>
<body class="bg-gray-100 text-gray-900 font-sans">

    <!-- Container -->
    <div class="max-w-lg mx-auto p-8 bg-white shadow-lg rounded-lg mt-12">

        <!-- Title Section -->
        <h1 class="text-3xl font-extrabold text-center text-gray-900 mb-8">Tambah Produk</h1>

        <!-- Form -->
        <form id="productForm" action="{{ route('products.store') }}" method="POST">
            @csrf
            <!-- Nama Produk -->
            <div class="mb-6">
                <label for="name" class="block text-sm font-medium text-gray-800 mb-2">Nama Produk</label>
                <input type="text" name="name" id="name" class="border border-gray-300 rounded-md p-3 w-full focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>
            </div>

            <!-- Deskripsi Produk -->
            <div class="mb-6">
                <label for="description" class="block text-sm font-medium text-gray-800 mb-2">Deskripsi</label>
                <textarea name="description" id="description" class="border border-gray-300 rounded-md p-3 w-full focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required></textarea>
            </div>

            <!-- Harga Produk -->
            <div class="mb-6">
                <label for="price" class="block text-sm font-medium text-gray-800 mb-2">Harga</label>
                <input type="number" name="price" id="price" class="border border-gray-300 rounded-md p-3 w-full focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>
            </div>

            <!-- Stok Produk -->
            <div class="mb-6">
                <label for="stock" class="block text-sm font-medium text-gray-800 mb-2">Stok</label>
                <input type="number" name="stock" id="stock" class="border border-gray-300 rounded-md p-3 w-full focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>
            </div>

            <!-- Submit Button -->
            <div class="flex justify-center">
                <button type="button" onclick="openConfirmModal()" class="bg-blue-600 text-white px-6 py-3 rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 transition duration-300">
                    Simpan
                </button>
            </div>
        </form>
    </div>

    <!-- Modal Confirmation -->
    <div id="confirmModal" class="modal-overlay flex">
        <div class="modal-content">
            <h3 class="text-xl font-semibold text-gray-800 mb-4">Konfirmasi Penyimpanan</h3>
            <p class="text-gray-700 mb-6">Apakah Anda yakin ingin menyimpan produk ini?</p>
            <div class="flex justify-end space-x-4">
                <button id="cancelButton" class="bg-gray-300 text-gray-800 px-6 py-2 rounded-lg hover:bg-gray-400">
                    Batal
                </button>
                <button id="confirmButton" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700">
                    Simpan
                </button>
            </div>
        </div>
    </div>

    <!-- JavaScript for Modal and Form Submission -->
    <script>
        function openConfirmModal() {
            // Show the confirmation modal
            const modal = document.getElementById('confirmModal');
            modal.style.display = 'flex';
        }

        // Handle cancel button
        document.getElementById('cancelButton').addEventListener('click', () => {
            const modal = document.getElementById('confirmModal');
            modal.style.display = 'none';
        });

        // Handle confirm button
        document.getElementById('confirmButton').addEventListener('click', () => {
            // Submit the form
            const form = document.getElementById('productForm');
            form.submit();
        });
    </script>

</body>
</html>
