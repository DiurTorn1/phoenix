@extends('layouts.app')
@section('title-block') Панель оплаты @endsection

@section('content')

@guest


@else
	@if(!empty(Auth::user()->getRoleNames()))
    @foreach( Auth::user()->getRoleNames() as $v)
		@if($v == "nullbody")
		<script type="text/javascript" src = "{{ asset('js/sell_panel.js') }}"></script>
        <!-------------------------------Окно НАСТРОЕК Пользователя------------------------------->
  	<div class="popup-back-user"> 
		<div class="popup-container">
			<div class="popup-content">
				<div class="popup-title-wrap">
					<button class="popup-close close-btn" title="Закрыть" onclick="window.location.href = '/';"><img src="img/close.png" alt="Закрыть" ></button>

					<div class="popup-title-wrap-row popup-title-none is-active" data-content="user-profile">
						<h2 class="popup-title">Карточка покупки</h2>
					</div>
				</div>

				<div class="popup-content-wrap-item is-active" data-content="user-profile"><!-- Вкладка ПРОФИЛЬ ------- -->
					<div class="popup-content-wrap-row">
						<img id="sell_src_img" src="">
					</div>
					<div class="user-input-box block-w100">
						<label>Пользователь</label>
						<input type="text" placeholder="" id="user_sell" class="user-input" title="" disabled>
					</div>
					<div class="user-input-box block-w100">
						<label>Название продукта</label>
						<input type="text" placeholder="" id="name_product_sell" class="user-input" title="" disabled>
					</div>
					<div class="user-input-box block-w100">
						<label>Цена</label>
						<input type="text" placeholder="" id="price_product_sell" class="user-input" title="" disabled>
					</div>
					<div class="user-input-box block-w100">
						<label>Промокод</label>
						<input type="text" placeholder="Введите промокод" id="promocode_product_sell" class="user-input" title="">
					</div>
					<div class="user-input-box block-w100" id="public_ophert">
						<input type="checkbox" id="ophert" name="ophert" />
						<label>  Я принимаю условия <a class="user-link" id="public_ophert_box">публичной оферты</a>, даю согласие на обработку персональных данных и на регулярные списания рекурентных платежей. </label>
					</div>
					<div class="user-input-box block-w100" >
						<button type="submit" class="top-menu-btn" id="bay_product" >Оплатить</button>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="popup-back-user" id="ophert_box"> 
		<div class="popup-container-1">
			<div class="popup-content">
				<div class="popup-title-wrap">
					<button class="popup-close close-btn" title="Закрыть" id="close_box_ophert" ><img src="img/close.png" alt="Закрыть" ></button>

					<div class="popup-title-wrap-row popup-title-none is-active" data-content="user-profile">
						<h2 class="popup-title">Условия публичной оферты</h2>
					</div>
				</div>

				<div class="popup-content-wrap-item is-active" data-content="user-profile"><!-- Вкладка ПРОФИЛЬ ------- -->
					<div class="user-input-box block-w100" style="white-space: normal; border: 1px solid #7d5d80; text-align: center;">
						<h1>ПУБЛИЧНАЯ ОФЕРТА</h1><br>
 						<h2>о заключении договора об оказании услуг<h2><br>

    					<h1>1. Общие положения</h1><br>
						<a>&#9;	В настоящей Публичной оферте содержатся условия заключения Договора об оказании услуг (далее по тексту - «Договор об оказании услуг» и/или «Договор»). Настоящей офертой признается предложение, адресованное одному или нескольким конкретным лицам, которое достаточно определенно и выражает намерение лица, сделавшего предложение, считать себя заключившим Договор с адресатом, которым будет принято предложение.</a><br>
						<a>&#9;	Совершение указанных в настоящей Оферте действий является подтверждением согласия обеих Сторон заключить Договор об оказании услуг на условиях, в порядке и объеме, изложенных в настоящей Оферте.</a><br>
						<a>&#9;	Нижеизложенный текст Публичной оферты является официальным публичным предложением Исполнителя, адресованный заинтересованному кругу лиц заключить Договор об оказании услуг в соответствии с положениями пункта 2 статьи 437 Гражданского кодекса РФ.
						<a>&#9;	Договор об оказании услуг считается заключенным и приобретает силу с момента совершения Сторонами действий, предусмотренных в настоящей Оферте, и, означающих безоговорочное, а также полное принятие всех условий настоящей Оферты без каких-либо изъятий или ограничений на условиях присоединения.</a><br>

						<h3>Термины и определения:</h3><br>
						<a>&#9;<strong>Договор</strong> – текст настоящей Оферты с Приложениями, являющимися неотъемлемой частью настоящей Оферты, акцептованный Заказчиком путем совершения конклюдентных действий, предусмотренных настоящей Офертой.</a><br>
						<a>&#9;<strong>Конклюдентные действия</strong> — это поведение, которое выражает согласие с предложением контрагента заключить, изменить или расторгнуть договор. Действия состоят в полном или частичном выполнении условий, которые предложил контрагент.</a><br> 
						<a>&#9;<strong>Сайт Исполнителя в сети «Интернет»</strong> – совокупность программ для электронных вычислительных машин и иной информации, содержащейся в информационной системе, доступ к которой обеспечивается посредством сети «Интернет» на <a class="user-link" href="https://phoenixtv.ru">phoenixtv.ru</a> и URL-сервер rtmp://rtmp.kinescope.io/live.</a><br>
						<a>&#9;<strong>Стороны Договора (Стороны)</strong> – Исполнитель и Заказчик.</a><br>
						<a>&#9;<strong>Услуга</strong> – услуга, оказываемая Исполнителем Заказчику в порядке и на условиях, установленных настоящей Офертой.</a><br>

    					<h3>&#9;2. Предмет Договора</h3><br>
        				<a>&#9;2.1. Исполнитель обязуется оказать Заказчику Услуги, а Заказчик обязуется оплатить их в размере, порядке и сроки, установленные настоящим Договором.</a><br>
        				<a>&#9;2.2. Наименование, количество, порядок и иные условия оказания Услуг определяются на основании сведений Исполнителя при оформлении заявки Заказчиком, либо устанавливаются на сайте Исполнителя в сети «Интернет»: <a class="user-link" href="https://phoenixtv.ru">phoenixtv.ru</a><br>
        				<a>&#9;2.3. Исполнитель оказывает Услуги по настоящему Договору лично, либо с привлечением третьих лиц, при этом за действия третьих лиц Исполнитель отвечает перед Заказчиком как за свои собственные.</a>
        				<a>&#9;2.4. Договор заключается путем акцепта настоящей Оферты через совершение конклюдентных действий, выраженных в:</a><br>
    					<a>&#9;  • действиях, связанных с регистрацией учетной записи на Сайте Исполнителя в сети «Интернет» при наличии необходимости регистрации учетной записи;</a><br>
    					<a>&#9;  • оформлении и направлении Заказчиком заявки в адрес Исполнителя для оказания Услуг;</a><br>
    					<a>&#9;	 • действиях, связанных с оплатой Услуг Заказчиком, включая Услуг, по которым предусмотрены рекуррентные платежи, с указанной на сайте <a class="user-link" href="https://phoenixtv.ru">phoenixtv.ru</a> периодичностью автоматических списаний оплаты Услуг Заказчиком;</a><br>
    					<a>&#9;	 • действиях, связанных с оказанием Услуг Исполнителем.</a><br>
						<a>&#9;Данный перечень неисчерпывающий, могут быть и другие действия, которые ясно выражают намерение лица принять предложение контрагента. </a><br>

    					<h1>3. Права и обязанности Сторон</h1><br>

        				<h3>&#9; 3.1.  Права и обязанности Исполнителя:</h3><br>
            			<a>&#9; 3.1.1. Исполнитель обязуется оказать Услуги в соответствии с положениями настоящего Договора, в сроки и объеме, указанные в настоящем Договоре и (или) в порядке, указанном на Сайте Исполнителя.</a><br>
            			<a>&#9; 3.1.2. Исполнитель обязуется предоставлять Заказчику доступ к разделам Сайта, необходимым для получения информации, согласно пункту 2.1. Договора.</a><br>
            			<a>&#9; 3.1.3. Исполнитель несет ответственность за хранение и обработку персональных данных Заказчика, обеспечивает сохранение конфиденциальности этих данных и использует их исключительно для качественного оказания Услуг Заказчику.</a><br>
            			<a>&#9; 3.1.4. Исполнитель оставляет за собой право изменять сроки (период) оказания Услуг и условия настоящей Оферты в одностороннем порядке без предварительного уведомления Заказчика, публикуя указанные изменения на Сайте Исполнителя в сети «Интернет». 
						При этом новые / измененные условия, указываемые на Сайте, действуют только в отношении вновь заключаемых Договоров.</a><br>
        				<h3>&#9; 3.2.  Права и обязанности Заказчика:</h3><br>
            			<a>&#9; 3.2.1. Заказчик обязан предоставлять достоверную информацию о себе при получении соответствующих Услуг.</a><br>
            			<a>&#9; 3.2.2.  Заказчик обязуется не воспроизводить, не повторять, не копировать, не продавать, а также не использовать в каких бы то ни было целях информацию и материалы, ставшие ему доступными в связи с оказанием Услуг, за исключением личного использования непосредственно самим Заказчиком без предоставления в какой-либо форме доступа каким-либо третьим лицам.</a><br>
            			<a>&#9; 3.2.3. Заказчик обязуется принять Услуги, оказанные Исполнителем;</a><br>
            			<a>&#9; 3.2.4. Заказчик вправе потребовать от Исполнителя вернуть денежные средства за неоказанные услуги, некачественно оказанные услуги, услуги, оказанные с нарушением сроков оказания, а также, если Заказчик решил отказаться от услуг по причинам, не связанным с нарушением обязательств со стороны Исполнителя, исключительно по основаниям, предусмотренным действующим законодательством Российской Федерации.</a><br>
            			<a>&#9; 3.2.5. Заказчик гарантирует, что все условия Договора ему понятны; Заказчик принимает условия без оговорок, а также в полном объеме.</a><br>

    					<h1>4. Цена и порядок расчетов</h1><br>
        				<a>&#9; 4.1. Стоимость услуг Исполнителя, оказываемых Заказчиком и порядок их оплаты, определяются на основании сведений Исполнителя при оформлении заявки Заказчиком либо устанавливаются на Сайте Исполнителя в сети «Интернет»: <a class="user-link" href="https://phoenixtv.ru">phoenixtv.ru</a></a><br>
        				<a>&#9; 4.2. Все расчеты по Договору производятся в безналичном порядке.</a><br>

    					<h1>5. Конфиденциальность и безопасность</h1><br>
        				<a>&#9; 5.1. При реализации настоящего Договора Стороны обеспечивают конфиденциальность и безопасность персональных данных в соответствии с актуальной редакцией ФЗ от 27.07.2006 г. № 152-ФЗ «О персональных данных» и ФЗ от 27.07.2006 г. № 149-ФЗ «Об информации, информационных технологиях и о защите информации».</a><br>
        				<a>&#9; 5.2. Стороны обязуются сохранять конфиденциальность информации, полученной в ходе исполнения настоящего Договора, и принять все возможные меры, чтобы предохранить полученную информацию от разглашения.</a><br>
        				<a>&#9; 5.3. Под конфиденциальной информацией понимается любая информация, передаваемая Исполнителем и Заказчиком в процессе реализации Договора и подлежащая защите, исключения указаны ниже.</a><br>
        				<a>&#9; 5.4. Такая информация может содержаться в предоставляемых Исполнителю локальных нормативных актах, договорах, письмах, отчетах, аналитических материалах, результатах исследований, схемах, графиках, спецификациях и других документах, оформленных как на бумажных, так и на электронных носителях.</a><br>

    					<h1>6. Форс-мажор</h1><br>
        				<a>&#9; 6.1. Стороны освобождаются от ответственности за неисполнение или ненадлежащее исполнение обязательств по Договору, если надлежащее исполнение оказалось невозможным вследствие непреодолимой силы, то есть чрезвычайных и непредотвратимых при данных условиях обстоятельств, под которыми понимаются: запретные действия властей, эпидемии, блокада, эмбарго, землетрясения, наводнения, пожары или другие стихийные бедствия.</a><br>
        				<a>&#9; 6.2. В случае наступления этих обстоятельств Сторона обязана в течение 30 (Тридцати) рабочих дней уведомить об этом другую Сторону. </a><br>
        				<a>&#9; 6.3. Документ, выданный уполномоченным государственным органом, является достаточным подтверждением наличия и продолжительности действия непреодолимой силы. </a><br>
        				<a>&#9; 6.4. Если обстоятельства непреодолимой силы продолжают действовать более 60 (Шестидесяти) рабочих дней, то каждая Сторона вправе отказаться от настоящего Договора в одностороннем порядке. </a><br>
    					<h1>7. Ответственность Сторон</h1><br>
        				<a>&#9; 7.1. В случае неисполнения и/или ненадлежащего исполнения своих обязательств по Договору, Стороны несут ответственность в соответствии с условиями настоящей Оферты.</a><br>
        				<a>&#9; 7.2. Исполнитель не несет ответственности за неисполнение и/или ненадлежащее исполнение обязательств по Договору, если такое неисполнение и/или ненадлежащее исполнение произошло по вине Заказчика.</a><br>
        				<a>&#9; 7.3. Сторона, не исполнившая или ненадлежащим образом исполнившая обязательства по Договору, обязана возместить другой Стороне причиненные такими нарушениями убытки.</a><br>
    					<h1>8. Срок действия настоящей Оферты</h1>
        				<a>&#9; 8.1. Оферта вступает в силу с момента размещения на Сайте Исполнителя и действует до момента её отзыва Исполнителем.</a><br>
        				<a>&#9; 8.2. Исполнитель оставляет за собой право внести изменения в условия Оферты и/или отозвать Оферту в любой момент по своему усмотрению. Сведения об изменении или отзыве Оферты доводятся до Заказчика по выбору Исполнителя посредством размещения на сайте Исполнителя в сети «Интернет», в Личном кабинете Заказчика, либо путем направления соответствующего уведомления на электронный или почтовый адрес, указанный Заказчиком при заключении Договора или в ходе его исполнения.</a><br>
        				<a>&#9; 8.3. Договор вступает в силу с момента Акцепта условий Оферты Заказчиком и действует до полного исполнения Сторонами обязательств по Договору.</a><br>
        				<a>&#9; 8.4. Изменения, внесенные Исполнителем в Договор и опубликованные на сайте в форме актуализированной Оферты, считаются принятыми Заказчиком в полном объеме.</a><br>


    					<h1>9. Дополнительные условия</h1><br>
        				<a>&#9; 9.1. Договор, его заключение и исполнение регулируется действующим законодательством Российской Федерации. Все вопросы, не урегулированные настоящей Офертой или урегулированные не полностью, регулируются в соответствии с материальным правом Российской Федерации.</a><br>
        				<a>&#9; 9.2. В случае возникновения спора, который может возникнуть между Сторонами в ходе исполнения ими своих обязательств по Договору, заключенному на условиях настоящей Оферты, Стороны обязаны урегулировать спор мирным путем до начала судебного разбирательства. 
						Судебное разбирательство осуществляется в соответствии с законодательством Российской Федерации. 
						Споры или разногласия, по которым Стороны не достигли договоренности, подлежат разрешению в соответствии с законодательством РФ. Досудебный порядок урегулирования спора является обязательным.</a><br>
        				<a>&#9; 9.3. В качестве языка Договора, заключаемого на условиях настоящей Оферты, а также языка, используемого при любом взаимодействии Сторон (включая ведение переписки, предоставление требований / уведомлений / разъяснений, предоставление документов и т. д.), Стороны определили русский язык.</a><br>
        				<a>&#9; 9.4. Все документы, подлежащие предоставлению в соответствии с условиями настоящей Оферты, должны быть составлены на русском языке либо иметь перевод на русский язык, удостоверенный в установленном порядке.</a><br>
        				<a>&#9; 9.5. Бездействие одной из Сторон в случае нарушения условий настоящей Оферты не лишает права заинтересованной Стороны осуществлять защиту своих интересов позднее, а также не означает отказа от своих прав в случае совершения одной из Сторон подобных либо сходных нарушений в будущем.</a><br>
        				<a>&#9; 9.6. Если на Сайте Исполнителя в сети «Интернет» есть ссылки на другие веб-сайты и материалы третьих лиц, такие ссылки размещены исключительно в целях информирования, и Исполнитель не имеет контроля в отношении содержания таких сайтов или материалов. Исполнитель не несет ответственность за любые убытки или ущерб, которые могут возникнуть в результате использования таких ссылок.</a><br>

    					<h1>10. Реквизиты Исполнителя</h1><br>

						<a>&#9; <strong>Полное наименование:</strong> Автономная некоммерческая физкультурно-спортивная организация «Центр развития спортивных проектов «ФЕНИКС»</a><br>
						<a>&#9; <strong>Сокращенное наименование:</strong> АНФСО «ЦРСП «ФЕНИКС»</a><br>
						<a>&#9; <strong>Адрес:</strong> 197375, Россия, Санкт-Петербург, ул. 2-я Алексеевская, д. 7, лит. А, пом. 27-Н, каб. 1.</a><br>
						<a>&#9; <strong>ИНН</strong> 7814822027, <strong>КПП</strrong> 781401001</a><br>
						<a>&#9; <strong>ОГРН</strong> 1237800047870</a><br>
						<a>&#9; Контактный телефон: +7-921-9639127</a><br>
						<a>&#9; Контактный e-mail: <a class="user-link" href="mailto:info-phoenixtv@mail.ru">info-phoenixtv@mail.ru</a></a><br>
					</div>
					<div class="user-input-box block-w100" >
						<button type="submit" class="top-menu-btn" id="read_box_ophert" >Я прочитал условия публичной оферты</button>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<main class="index-main">
		
	</main>

	<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> <script type="text/javascript" src = "{{ asset('js/user_menu.js') }}"></script> -->
	

        @endif
    @endforeach
    @endif
@endguest

@endsection