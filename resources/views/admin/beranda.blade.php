<x-template-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="w-full mt-12">
                    <p class="text-xl pb-3 flex items-center">
                        <i class="fas fa-list mr-3"></i> {{$title}}
                    </p>
                    <div class="bg-white overflow-auto">
                        <table class="min-w-full bg-white">
                            <thead class="bg-green-700 text-white">
                            <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-white-500 uppercase tracking-wider">Nama</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-white-500 uppercase tracking-wider">NIP</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-white-500 uppercase tracking-wider">Alamat</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-white-500 uppercase tracking-wider">No Absen</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-white-500 uppercase tracking-wider">Email</th>
                            </tr>
                        
                            <tbody class="bg-white divide-y divide-gray-900">
                              <!-- More items... -->
                              <tr>
                                    <td>Made Andika Ary Wiguna</td>
                                    <td>1905021021</td>
                                    <td>Desa Jinengadalem</td>
                                    <td>089697338542</td>
                                    <td>andikaeiguna82@gmail.com</td>
                                </tr>
                                <tr>
                                    <td>I Gusti Putu Aditya Permadi</td>
                                    <td>1905021009</td>
                                    <td>Jalan Bukit Lempuyang</td>
                                    <td>085965900427</td>
                                    <td>aditya.permadi@gmail.com</td>
                                </tr>

                                <tr>
                                    <td>Putu Krisna Putra</td>
                                    <td>1905021010</td>
                                    <td>Jalan pemaron singaraja</td>
                                    <td>085678567356</td>
                                    <td>Krisna.putra@gmail.com</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
            </div>
        </div>
    </div>
</x-template-layout>