@extends('admin_panel')
@section('title-block') Комментаторы @endsection
@section('admin_res')
<script type="text/javascript" src = "{{ asset('js/comment.js') }}"></script>
<div class="top-menu-admin admin-back">
    <table>
        <tbody class="tbody-wrapper" id="coment_list">
            <tr class="tr-wrapper admin-video-item admin-back">
                <th>ID</th>
                <th>Имя</th>
                <th>Почта</th>
                <th width="280px">Action</th>
            </tr>
        </tbody>
    </table>
</div>
@endsection