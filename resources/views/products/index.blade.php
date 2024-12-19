<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Produk</title>
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
    <div class="max-w-7xl mx-auto p-8">

        <!-- Title Section -->
        <h1 class="text-3xl font-extrabold text-center text-gray-800 mb-8">Daftar Produk</h1>

        <!-- Success Message -->
        @if (session('success'))
            <div class="bg-green-500 text-white p-4 rounded-md shadow-lg mb-6">
                {{ session('success') }}
            </div>
        @endif

        <!-- Add Product Button -->
        <div class="mb-6 text-right">
            <a href="{{ route('products.create') }}" class="inline-block bg-blue-600 text-white px-6 py-3 rounded-lg shadow-md hover:bg-blue-700 transition duration-300 ease-in-out">
                Tambah Produk
            </a>
        </div>

        <!-- Product Table -->
        <div class="overflow-x-auto bg-white shadow-lg rounded-lg">
            <table class="min-w-full table-auto">
                <thead class="bg-gray-800 text-white">
                    <tr>
                        <th class="py-3 px-6 text-center">ID</th>
                        <th class="py-3 px-6 text-center">Nama</th>
                        <th class="py-3 px-6 text-center">Deskripsi</th>
                        <th class="py-3 px-6 text-center">Harga</th>
                        <th class="py-3 px-6 text-center">Stok</th>
                        <th class="py-3 px-6 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-gray-800">
                    @foreach ($products as $product)
                        <tr class="hover:bg-gray-100">
                            <td class="py-4 px-6 text-center">{{ $product->id }}</td>
                            <td class="py-4 px-6 font-medium text-center">{{ $product->name }}</td>
                            <td class="py-4 px-6 text-center">{{ $product->description }}</td>
                            <td class="py-4 px-6 text-center">Rp{{ number_format($product->price, 0, ',', '.') }}</td>
                            <td class="py-4 px-6 text-center">{{ $product->stock }}</td>
                            <td class="py-4 px-6 text-center">
                                <a href="{{ route('products.edit', $product->id) }}" class="text-blue-600 hover:text-blue-800 font-medium mr-4">
                                    Edit
                                </a>
                                <button onclick="openDeleteModal({{ $product->id }})" class="text-red-600 hover:text-red-800 font-medium">
                                    Hapus
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal Confirmation -->
    <div id="deleteModal" class="modal-overlay flex">
        <div class="modal-content">
            <h3 class="text-xl font-semibold text-gray-800 mb-4">Konfirmasi Penghapusan</h3>
            <p class="text-gray-700 mb-6">Apakah Anda yakin ingin menghapus produk ini?</p>
            <div class="flex justify-end space-x-4">
                <button id="cancelButton" class="bg-gray-300 text-gray-800 px-6 py-2 rounded-lg hover:bg-gray-400">
                    Batal
                </button>
                <form id="deleteForm" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-600 text-white px-6 py-2 rounded-lg hover:bg-red-700">
                        Hapus
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- JavaScript for Modal -->
    <script>
        function openDeleteModal(productId) {
            // Set the action for the delete form
            const form = document.getElementById('deleteForm');
            form.action = `/products/${productId}`;

            // Show the modal
            const modal = document.getElementById('deleteModal');
            modal.style.display = 'flex';
        }

        // Close the modal
        document.getElementById('cancelButton').addEventListener('click', () => {
            const modal = document.getElementById('deleteModal');
            modal.style.display = 'none';
        });
    </script>

</body>
</html>
