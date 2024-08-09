@extends('card_stream_main')
@section('title-block') Аналитика @endsection
@section('card_stream_res')
	
<!----------------------------Стрим-контент РЕСТРИМ ---------------------------------->
<div class="admin-content">
			
            <div class="block-admin-container admin-back">
                <span class="log-titel-min">Зрителей онлайн</span>
                <div class="analitik-window">
                    
                </div>
                <table>
                    <tbody class="tbody-wrapper">
                         <tr class="tr-wrapper admin-video-item admin-back restream-row">
                               <th>Заголовок</th>
                               <th>Включен/Выключен</th>
                               <th>RTMP URL</th>
                               <th>RTMP ключ</th>
                               <th>Статус</th>
                               <th>Длительность</th>
                               <th>Управление</th>
                        </tr>
                        <tr class="tr-wrapper admin-video-item admin-back">
                            <td>
                                
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="restrem-manage-wrapper">
                    <p>Рестримов на странице:</p>
                    <select class="admin-input admin-input-select restream-select">
                        <option value="">10</option>
                        <option value="">20</option>
                    </select>
                    <span>0-10</span>
                    <p>из</p>
                    <span>20</span>
                    <button class="restream-select-btn" title="Назад">&#8249;</button>
                    <button class="restream-select-btn" title="Вперед">&#8250;</button>
                </div>
            </div>
    
        </div>
@endsection