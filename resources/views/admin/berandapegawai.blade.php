<x-template-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{$title}}
        </h2><br>
    <div>
        <div class="shadow px-6 py-4 bg-white rounded sm:px-2 sm:py-1 sm:br-gray-100">
          <div class="grid grid-cols-12">
            <div class="col-span-6 p-4">
              <a href="{{route('pegawai.create')}}"><button class="px-4 py-1 text-sm rounded text-purple-600 font-semibold border border-purple-200
              hover:text-white hover:bg-purple-600 hover:border-transparent focus:outline-none">Tambah<button></a>
           </div>
          </div>
        <div class="shadow overflow-hidden border-b boorder-gray-200 sm:rounded-lg m-1">
        <table class="min-w-full divide-y divide-gray-200 p-3">
          <thead class="bg-gray-50">
              <tr class="text-lg " >
                  <th class="w-1">Tandai </th>
                  <th>No</th>
                  <th>NIP</th>
                  <th>NAMA</th>
                  <th>JABATAN</th>
                  <th>GAMBAR</th>
                  <th>AKSI</th>
              </tr>
          </thead>
          <tbody class=" text-center bg-white divide-y divide-gray-200">
          <?php $no=1; ?>
            @foreach ($pegawai as $item)
              <tr>
                    <td><input type="checkbox" name="" id=""></td>
                    <td>{{$no}}</td>
                    <td>{{$item->NIP}}</td>
                    <td>{{$item->Nama}}</td>
                    <td>{{$item->jabatan}}</td>
                    <td align="center">
                      <img src="{{asset('storage/' .$item->gambar)}}" class="w-16" alt="">
                    </td>
                    <td>
                        <form action="{{route('pegawai.destroy',$item->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                         <a href="{{route('pegawai.edit',$item->id)}}" class="btn btn-xs p-2 rounded bg-green-200 m-3 hover:bg-blue hover:text-blue-900">Edit</a>
                          <button type="submit" class="btn btn-xs p-2 rounded bg-red-500 m-3 hover:bg-red hover:text-white-900">Del</button>
                        </form>
                    </td>
              </tr>
                <?php $no++; ?>
            @endforeach
          </tbody>
        </table>
        </div>
    </div>
</x-template-layout>