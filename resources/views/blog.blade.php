@extends('layouts.app')

@section('title', 'บทความทั้งหมด')

@section('content')
 @if (count($blogs)>0)
 <h2 class="text text-center py-2">บทความทั้งหมด </h2>
 <table class="table table-bordered text-center">
     <thead>
         <tr>
             <th scope="col">บทความ</th>
             <th scope="col">เนื้อหา</th>
             <th scope="col">สถานะ</th>
             <th scope="col">แก้ไขบทความ</th>
             <th scope="col">ลบบทความ</th>
         </tr>
     </thead>
     <tbody>
         @foreach ($blogs as $item)
             <tr>
                 <th>{{ $item->title }}</th>
                 <td>{{ Str::limit($item->content, 10) }}</td>
                 <td>
                     @if ($item->status == true)
                         <a href="{{route('chang_status',$item->id)}}" class="btn btn-success"> แผยแพร่</a>
                     @else
                         <a href="{{route('chang_status',$item->id)}}" class="btn btn-secondary"> ฉบับร่าง</a>
                     @endif
                 </td>
                 <td>
                     <a href="{{route('edit',$item->id)}}" class="btn btn-warning">แก้ไขบทความ</a>
                 </td>
                 <td>
                     <a href="{{ route('delete', $item->id) }}" 
                     class="btn btn-danger"
                     onclick="return confirm('คุณต้องการลบบทความ {{$item->title}} หรือไม่ ? ')"
                     >ลบ</a>
                 </td>
             </tr>
         @endforeach
     </tbody>
 </table>
 
 {{ $blogs->links() }}
 @else
 <h2 class="text text-center py-2">ไม่พบบทความในระบบ </h2>
 @endif
@endsection
