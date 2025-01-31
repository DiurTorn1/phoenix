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
						<label>Я даю согласие на регулярные списания, на обработку персональных данных и принимаю условия <a class="user-link" id="public_ophert_box">публичной оферты</a></label>
					</div>
					<div class="user-input-box block-w100" >
						<button type="submit" class="top-menu-btn" id="bay_product" >Оплатить</button>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="popup-back-user" id="ophert_box"> 
		<div class="popup-container">
			<div class="popup-content">
				<div class="popup-title-wrap">
					<button class="popup-close close-btn" title="Закрыть" id="close_box_ophert" ><img src="img/close.png" alt="Закрыть" ></button>

					<div class="popup-title-wrap-row popup-title-none is-active" data-content="user-profile">
						<h2 class="popup-title">Условия публичной оферты</h2>
					</div>
				</div>

				<div class="popup-content-wrap-item is-active" data-content="user-profile"><!-- Вкладка ПРОФИЛЬ ------- -->
					<div class="user-input-box block-w100" style="white-space: normal; border: 1px solid #7d5d80;">
						<h1>ПУБЛИЧНАЯ ОФЕРТА</h1><br>
 						<h2>о заключении договора об оказании услуг<h2><br>

    					<h1>1. Общие положения</h1><br>
<a>В настоящей Публичной оферте содержатся условия заключения Договора об оказании услуг (далее по тексту - «Договор об оказании услуг» и/или «Договор»). Настоящей офертой признается предложение, адресованное одному или нескольким конкретным лицам, которое достаточно определенно и выражает намерение лица, сделавшего предложение, считать себя заключившим Договор с адресатом, которым будет принято предложение.
Совершение указанных в настоящей Оферте действий является подтверждением согласия обеих Сторон заключить Договор об оказании услуг на условиях, в порядке и объеме, изложенных в настоящей Оферте.
Нижеизложенный текст Публичной оферты является официальным публичным предложением Исполнителя, адресованный заинтересованному кругу лиц заключить Договор об оказании услуг в соответствии с положениями пункта 2 статьи 437 Гражданского кодекса РФ.
Договор об оказании услуг считается заключенным и приобретает силу с момента совершения Сторонами действий, предусмотренных в настоящей Оферте, и, означающих безоговорочное, а также полное принятие всех условий настоящей Оферты без каких-либо изъятий или ограничений на условиях присоединения.</a><br>

Термины и определения:
Договор – текст настоящей Оферты с Приложениями, являющимися неотъемлемой частью настоящей Оферты, акцептованный Заказчиком путем совершения конклюдентных действий, предусмотренных настоящей Офертой.
Конклюдентные действия — это поведение, которое выражает согласие с предложением контрагента заключить, изменить или расторгнуть договор. Действия состоят в полном или частичном выполнении условий, которые предложил контрагент. 
Сайт Исполнителя в сети «Интернет» – совокупность программ для электронных вычислительных машин и иной информации, содержащейся в информационной системе, доступ к которой обеспечивается посредством сети «Интернет» на phoenixtv.ru и URL-сервер rtmp://rtmp.kinescope.io/live.
Стороны Договора (Стороны) – Исполнитель и Заказчик.
Услуга – услуга, оказываемая Исполнителем Заказчику в порядке и на условиях, установленных настоящей Офертой.

    2. Предмет Договора
        2.1. Исполнитель обязуется оказать Заказчику Услуги, а Заказчик обязуется оплатить их в размере, порядке и сроки, установленные настоящим Договором.
        2.2. Наименование, количество, порядок и иные условия оказания Услуг определяются на основании сведений Исполнителя при оформлении заявки Заказчиком, либо устанавливаются на сайте Исполнителя в сети «Интернет»: phoenixtv.ru 
        2.3. Исполнитель оказывает Услуги по настоящему Договору лично, либо с привлечением третьих лиц, при этом за действия третьих лиц Исполнитель отвечает перед Заказчиком как за свои собственные.
        2.4. Договор заключается путем акцепта настоящей Оферты через совершение конклюдентных действий, выраженных в:
    • действиях, связанных с регистрацией учетной записи на Сайте Исполнителя в сети «Интернет» при наличии необходимости регистрации учетной записи;
    • оформлении и направлении Заказчиком заявки в адрес Исполнителя для оказания Услуг;
    • действиях, связанных с оплатой Услуг Заказчиком, включая Услуг, по которым предусмотрены рекуррентные платежи, с указанной на сайте phoenixtv.ru периодичностью автоматических списаний оплаты Услуг Заказчиком;
    • действиях, связанных с оказанием Услуг Исполнителем.
Данный перечень неисчерпывающий, могут быть и другие действия, которые ясно выражают намерение лица принять предложение контрагента. 

    3. Права и обязанности Сторон

        3.1.  Права и обязанности Исполнителя:
            3.1.1. Исполнитель обязуется оказать Услуги в соответствии с положениями настоящего Договора, в сроки и объеме, указанные в настоящем Договоре и (или) в порядке, указанном на Сайте Исполнителя.
            3.1.2. Исполнитель обязуется предоставлять Заказчику доступ к разделам Сайта, необходимым для получения информации, согласно пункту 2.1. Договора.
            3.1.3. Исполнитель несет ответственность за хранение и обработку персональных данных Заказчика, обеспечивает сохранение конфиденциальности этих данных и использует их исключительно для качественного оказания Услуг Заказчику.
            3.1.4. Исполнитель оставляет за собой право изменять сроки (период) оказания Услуг и условия настоящей Оферты в одностороннем порядке без предварительного уведомления Заказчика, публикуя указанные изменения на Сайте Исполнителя в сети «Интернет». 
При этом новые / измененные условия, указываемые на Сайте, действуют только в отношении вновь заключаемых Договоров.
        3.2.  Права и обязанности Заказчика:
            3.2.1. Заказчик обязан предоставлять достоверную информацию о себе при получении соответствующих Услуг.
            3.2.2.  Заказчик обязуется не воспроизводить, не повторять, не копировать, не продавать, а также не использовать в каких бы то ни было целях информацию и материалы, ставшие ему доступными в связи с оказанием Услуг, за исключением личного использования непосредственно самим Заказчиком без предоставления в какой-либо форме доступа каким-либо третьим лицам.
            3.2.3. Заказчик обязуется принять Услуги, оказанные Исполнителем;
            3.2.4. Заказчик вправе потребовать от Исполнителя вернуть денежные средства за неоказанные услуги, некачественно оказанные услуги, услуги, оказанные с нарушением сроков оказания, а также, если Заказчик решил отказаться от услуг по причинам, не связанным с нарушением обязательств со стороны Исполнителя, исключительно по основаниям, предусмотренным действующим законодательством Российской Федерации.
            3.2.5. Заказчик гарантирует, что все условия Договора ему понятны; Заказчик принимает условия без оговорок, а также в полном объеме.

    4. Цена и порядок расчетов
        4.1. Стоимость услуг Исполнителя, оказываемых Заказчиком и порядок их оплаты, определяются на основании сведений Исполнителя при оформлении заявки Заказчиком либо устанавливаются на Сайте Исполнителя в сети «Интернет»: phoenixtv.ru
        4.2. Все расчеты по Договору производятся в безналичном порядке.

    5. Конфиденциальность и безопасность
        5.1. При реализации настоящего Договора Стороны обеспечивают конфиденциальность и безопасность персональных данных в соответствии с актуальной редакцией ФЗ от 27.07.2006 г. № 152-ФЗ «О персональных данных» и ФЗ от 27.07.2006 г. № 149-ФЗ «Об информации, информационных технологиях и о защите информации».
        5.2. Стороны обязуются сохранять конфиденциальность информации, полученной в ходе исполнения настоящего Договора, и принять все возможные меры, чтобы предохранить полученную информацию от разглашения.
        5.3. Под конфиденциальной информацией понимается любая информация, передаваемая Исполнителем и Заказчиком в процессе реализации Договора и подлежащая защите, исключения указаны ниже.
        5.4. Такая информация может содержаться в предоставляемых Исполнителю локальных нормативных актах, договорах, письмах, отчетах, аналитических материалах, результатах исследований, схемах, графиках, спецификациях и других документах, оформленных как на бумажных, так и на электронных носителях.

    6. Форс-мажор
        6.1. Стороны освобождаются от ответственности за неисполнение или ненадлежащее исполнение обязательств по Договору, если надлежащее исполнение оказалось невозможным вследствие непреодолимой силы, то есть чрезвычайных и непредотвратимых при данных условиях обстоятельств, под которыми понимаются: запретные действия властей, эпидемии, блокада, эмбарго, землетрясения, наводнения, пожары или другие стихийные бедствия. 
        6.2. В случае наступления этих обстоятельств Сторона обязана в течение 30 (Тридцати) рабочих дней уведомить об этом другую Сторону. 
        6.3. Документ, выданный уполномоченным государственным органом, является достаточным подтверждением наличия и продолжительности действия непреодолимой силы. 
        6.4. Если обстоятельства непреодолимой силы продолжают действовать более 60 (Шестидесяти) рабочих дней, то каждая Сторона вправе отказаться от настоящего Договора в одностороннем порядке. 
    7. Ответственность Сторон
        7.1. В случае неисполнения и/или ненадлежащего исполнения своих обязательств по Договору, Стороны несут ответственность в соответствии с условиями настоящей Оферты.
        7.2. Исполнитель не несет ответственности за неисполнение и/или ненадлежащее исполнение обязательств по Договору, если такое неисполнение и/или ненадлежащее исполнение произошло по вине Заказчика.
        7.3. Сторона, не исполнившая или ненадлежащим образом исполнившая обязательства по Договору, обязана возместить другой Стороне причиненные такими нарушениями убытки.
    8. Срок действия настоящей Оферты
        8.1. Оферта вступает в силу с момента размещения на Сайте Исполнителя и действует до момента её отзыва Исполнителем.
        8.2. Исполнитель оставляет за собой право внести изменения в условия Оферты и/или отозвать Оферту в любой момент по своему усмотрению. Сведения об изменении или отзыве Оферты доводятся до Заказчика по выбору Исполнителя посредством размещения на сайте Исполнителя в сети «Интернет», в Личном кабинете Заказчика, либо путем направления соответствующего уведомления на электронный или почтовый адрес, указанный Заказчиком при заключении Договора или в ходе его исполнения.
        8.3. Договор вступает в силу с момента Акцепта условий Оферты Заказчиком и действует до полного исполнения Сторонами обязательств по Договору.
        8.4. Изменения, внесенные Исполнителем в Договор и опубликованные на сайте в форме актуализированной Оферты, считаются принятыми Заказчиком в полном объеме.


    9. Дополнительные условия
        9.1. Договор, его заключение и исполнение регулируется действующим законодательством Российской Федерации. Все вопросы, не урегулированные настоящей Офертой или урегулированные не полностью, регулируются в соответствии с материальным правом Российской Федерации.
        9.2. В случае возникновения спора, который может возникнуть между Сторонами в ходе исполнения ими своих обязательств по Договору, заключенному на условиях настоящей Оферты, Стороны обязаны урегулировать спор мирным путем до начала судебного разбирательства. 
Судебное разбирательство осуществляется в соответствии с законодательством Российской Федерации. 
Споры или разногласия, по которым Стороны не достигли договоренности, подлежат разрешению в соответствии с законодательством РФ. Досудебный порядок урегулирования спора является обязательным.
        9.3. В качестве языка Договора, заключаемого на условиях настоящей Оферты, а также языка, используемого при любом взаимодействии Сторон (включая ведение переписки, предоставление требований / уведомлений / разъяснений, предоставление документов и т. д.), Стороны определили русский язык.
        9.4. Все документы, подлежащие предоставлению в соответствии с условиями настоящей Оферты, должны быть составлены на русском языке либо иметь перевод на русский язык, удостоверенный в установленном порядке.
        9.5. Бездействие одной из Сторон в случае нарушения условий настоящей Оферты не лишает права заинтересованной Стороны осуществлять защиту своих интересов позднее, а также не означает отказа от своих прав в случае совершения одной из Сторон подобных либо сходных нарушений в будущем.
        9.6. Если на Сайте Исполнителя в сети «Интернет» есть ссылки на другие веб-сайты и материалы третьих лиц, такие ссылки размещены исключительно в целях информирования, и Исполнитель не имеет контроля в отношении содержания таких сайтов или материалов. Исполнитель не несет ответственность за любые убытки или ущерб, которые могут возникнуть в результате использования таких ссылок.

    10. Реквизиты Исполнителя

Полное наименование: Автономная некоммерческая физкультурно-спортивная организация «Центр развития спортивных проектов «ФЕНИКС»
Сокращенное наименование: АНФСО «ЦРСП «ФЕНИКС»
Адрес: 197375, Россия, Санкт-Петербург, ул. 2-я Алексеевская, 
д. 7, лит. А, пом. 27-Н, каб. 1.
ИНН 7814822027, КПП 781401001
ОГРН 1237800047870
Контактный телефон: +7-921-9639127
Контактный e-mail: info-phoenixtv@mail.ru</a>
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