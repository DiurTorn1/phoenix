@extends('layouts.app')
@section('title-block') ГЛАВНАЯ - Феникс ТВ @endsection
@include('inc.banner')
@include('inc.header')

       

@section('content')
<div class="user-text-wrapper">
		<!-- Пользовательское соглашение -->
		<h2 class="user-h2">Пользовательское соглашение</h2>
		<p class="user-text">Настоящие Условия обслуживания(«Соглашение» или «Условия обслуживания»), предлагаемые PHOENIXTV.RU («PHOENIXTV.RU», «мы», «нас» или «наш») принимаются вами, нашим клиентом («вы» или «ваш»).
		Если вы приобретаете доступ к просмотру контента, указанного в момент покупки, вы попадаете под действие ограничений, установленных соответствующим правообладателем.</p>
		<p class="user-text">Настоящее Соглашение регулирует использование вами веб-сайта <a class="user-link" href="https://phoenixtv.ru">phoenixtv.ru</a> («Сайт») и наших онлайн-видеохостингов и служб совместного использования через управляемые нами веб-сайты, приложения, встраиваемые видеоплееры и дисплеи (совместно именуемые «Сервис»), а также ваш просмотр контента.</p>
		<p class="user-text">1. Принятие</p>
		<p class="user-text">1.1. Создавая учетную запись, просматривая доступный контент или иным образом посещая или используя наш Сервис, вы принимаете настоящее Соглашение и соглашаетесь заключить с нами договор в электронном виде.</p>
		<p class="user-text">1.2. Если вы являетесь юридическим лицом, отличным от физического лица, лицо, которое регистрирует учетную запись или иным образом использует наш Сервис, вы должны иметь право связывать обязательствами юридическое лицо и должны использовать регистрационный адрес электронной почты, принадлежащий или контролируемый такой организацией. В этом контексте «вы» означает как юридическое лицо, так и каждое лицо, имеющее право доступа к учетной записи.</p>
		<p class="user-text">1.3. Мы можем обновить это Соглашение, разместив обновленную версию на нашем веб-сайте. Продолжая использовать наш Сервис, вы принимаете любые пересмотренные Соглашения.</p>
		<p class="user-text">2. Сервис и контент</p>
		<p class="user-text">2.1.Лицензия на Сервис. В соответствии с условиями настоящего Соглашения мы предоставляем вам доступ к нашему Сервису. Это включает в себя право использовать все функции нашего видеоплеера, которые мы можем предоставить. Мы можем время от времени изменять доступные вам функции.</p>
		<p class="user-text">Объем доступа к контенту может быть ограничен в отношении каждой единицы контента, доступной через видеоплеер, и вы соглашаетесь соблюдать такие ограничения. Вам не предоставляются гарантии постоянной доступности любого контента, доступного через видеоплеер, и вы соглашаетесь с тем, что любой контент может быть удален из видеоплеера в любое время без предварительного уведомления. Разрешение на просмотр контента может быть аннулировано в любое время по любой причине. После отзыва или прекращения действия разрешения вы должны немедленно прекратить просмотр контента.</p>
		<p class="user-text">2.2. Применимые условия.</p>
		<p class="user-text">Вы должны соблюдать следующие условия:</p>
		<p class="user-text">Вы не будете подвергать обратному проектированию или декомпилировать видеоплеер.</p>
		<p class="user-text">Вы не будете сканировать или извлекать данные из контента, доступного в видеоплеере, без нашего предварительного письменного согласия.</p>
		<p class="user-text">Вы не будете изменять видео, доступные в видеоплеере.</p>
		<p class="user-text">Доступ к конкретным видом контента может быть предоставлен вам при условии оплаты за доступ к соответствующему контенту в течение срока, указанного в момент покупки. Мы не загружаем такой контент, не инициируем передачу такого контента, не выбираем получателя передачи, не обрабатываем контент заведомо незаконно, а также не изменяем и не модифицируем контент, загруженный соответствующим правообладателем. ФениксТВ не несет ответственности за качество и доступность контента, предоставляемого его правообладателями.</p>
		<p class="user-text">3. Учетные записи</p>
		<p class="user-text">3.1. Регистрация: Вы можете создать учетную запись, чтобы использовать определенные функции, которые мы предлагаем. Для этого вы должны указать ваш адрес электронной почты. Создавая учетную запись, вы соглашаетесь получать уведомления от PHOENIXTV.RU на этот адрес электронной почты.</p>
		<p class="user-text">3.2. Требования к возрасту: Для создания учетной записи или иного использования нашего Сервиса вам должно быть не менее 16 лет или соответствующего возраста совершеннолетия в вашей юрисдикции, в зависимости от того, который является большим. Если вы хотите использовать Сервис в коммерческих целях, вам должно быть не менее 18 лет. Лица, не достигшие соответствующего возраста, могут использовать наш Сервис только через учетную запись родителя или законного опекуна и с их участием. Перед тем, как продолжить использование Сервиса, попросите это лицо прочитать с вами настоящее Соглашение и согласиться с ним.</p>
		<p class="user-text">3.3. Родители и опекуны. Предоставляя ребенку разрешение на использование Сервиса через свою учетную запись, вы соглашаетесь и понимаете, что несете ответственность за мониторинг и контроль использования вашего ребенка. Если вы считаете, что ваш ребенок использует вашу учетную запись и не имеет вашего разрешения, немедленно свяжитесь с нами, чтобы мы могли отключить доступ.</p>
		<p class="user-text">3.4. Безопасность учетной записи: вы несете ответственность за все действия, которые происходят под вашей учетной записью, включая несанкционированные действия. Вы должны обеспечить конфиденциальность своих учетных данных. Если вы используете компьютер, к которому у других есть доступ, вы должны выходить из своей учетной записи после каждого сеанса. Если вам станет известно о несанкционированном доступе к вашей учетной записи, вы должны изменить свой пароль и немедленно уведомить нас.</p>
		<p class="user-text">4. Политика допустимого использования</p>
		<p class="user-text">Вы должны убедиться, что ваше использование Сервиса и ваше поведение соответствуют Политике допустимого использования, изложенной в данном Разделе 4. PHOENIXTV.RU может (но не обязано) контролировать вашу учетную запись и поведение, независимо от ваших настроек конфиденциальности.</p>
		<p class="user-text">PHOENIXTV.RU может предпринять все необходимые действия для защиты своих прав, включая приостановку или удаление вашей учетной записи.</p>
		<p class="user-text">4.1. Политика авторских прав</p>
		<p class="user-text">Вы можете использовать наш видеоплеер только для просмотра контента, предоставленного на Сайте, который может быть удален или изменен по нашему усмотрению. Контент может быть недоступен для просмотра на всех устройствах или во всех регионах.</p>
		<p class="user-text">4.2. Кодекс поведения</p>
		<p class="user-text">Используя наш Сервис, вы не можете:</p>
		<ul>
			<li><p class="user-text">Использовать оскорбительный псевдоним (например, нецензурную лексику) или аватар (например, содержащий изображение обнаженного тела);</p></li>
			<li><p class="user-text">действовать обманным путем или выдавать себя за какое-либо лицо или организацию;</p></li>
			<li><p class="user-text">преследовать или следить за любым человеком;</p></li>
			<li><p class="user-text">причинять вред или эксплуатировать несовершеннолетних;</p></li>
			<li><p class="user-text">распространять «спам» в любой форме или использовать вводящие в заблуждение метаданные;</p></li>
			<li><p class="user-text">собирать личную информацию о других;</p></li>
			<li><p class="user-text">получать доступ к чужой учетной записи без разрешения;</p></li>
			<li><p class="user-text">заниматься какой-либо незаконной деятельностью;</p></li>
			<li><p class="user-text">передавать или распространять любой контент любыми способами;</p></li>
			<li><p class="user-text">публично демонстрировать любой контент;</p></li>
			<li><p class="user-text">перепродавать просмотры любого контента;</p></li>
			<li><p class="user-text">разрешать другим входить в вашу учетную запись с целью просмотра контента;</p></li>
			<li><p class="user-text">использовать платежные средства, принадлежащие третьему лицу; или</p></li>
			<li><p class="user-text">побуждать или поощрять других делать что-либо из вышеперечисленного.</p></li>
		</ul>
		<p class="user-text">4.3. Запрещенные технические средства</p>
		<p class="user-text">Вам запрещается, за исключением случаев, разрешенных нами:</p>
		<ul>
			<li><p class="user-text">очищать, воспроизводить, распространять, создавать производные работы, декомпилировать, реконструировать, изменять, архивировать или дизассемблировать любую часть нашего Сервиса; или</p></li>
			<li><p class="user-text">пытаться обойти какие-либо наши меры безопасности, ограничения скорости, фильтрации или управления цифровыми правами;</p></li>
			<li><p class="user-text">отправлять любую вредоносную программу, скрипт или код;</p></li>
			<li><p class="user-text">использовать любой софт для блокировки рекламы;</p></li>
			<li><p class="user-text">отправлять необоснованное количество запросов на наши серверы; или</p></li>
			<li><p class="user-text">предпринимать любые другие действия, чтобы манипулировать нашим Сервисом, мешать его работе или наносить ему ущерб.</p></li>
		</ul>
		<p class="user-text">4.4. Пользователи с ограничениями</p>
		<p class="user-text">Вы не можете создать учетную запись, если вы являетесь членом террористической или экстремистской группы.</p>
		<p class="user-text">5. Права интеллектуальной собственности</p>
		<p class="user-text">Вам не предоставляются какие-либо права в отношении контента, доступного в нашем видеоплеере (включая, помимо прочего, логотип, тексты и литературные произведения, фотографии, изображения, видео и программное обеспечение), за исключением тех, которые прямо предоставлены данным Соглашением.</p>
		<p class="user-text">5.1. Профиль учетной записи</p>
		<p class="user-text">Вы предоставляете PHOENIXTV.RU безотзывное разрешение на использование вашего имени, изображения, биографии, товарных знаков, логотипов или других идентификаторов, используемых вами в вашем профиле учетной записи. Вы можете отозвать вышеупомянутое разрешение, удалив свою учетную запись.</p>
		<p class="user-text">PHOENIXTV.RU имеет право указывать публичные профили в своих маркетинговых материалах и материалах для инвесторов.</p>
		<p class="user-text">5.2. Другой контент; Обратная связь</p>
		<p class="user-text">Вы предоставляете PHOENIXTV.RU бессрочное и безотзывное право и лицензию на копирование, передачу, распространение, публичное исполнение и отображение контента, который вы отправляете в комментариях или других сообщениях через онлайн-средства в связи с нашим Сервисом. Если вы вносите в PHOENIXTV.RU предложения по улучшению наших продуктов или услуг, ФениксТВ может использовать ваши предложения без какой-либо компенсации вам.</p>
		<p class="user-text">6. Ваши обязанности</p>
		<p class="user-text">6.1. Заявления и гарантии</p>
		<p class="user-text">Настоящим вы заявляете и гарантируете, что имеете право доступа к веб-сайту, на котором доступен наш видеоплеер.</p>
		<p class="user-text">6.2. Возмещение</p>
		<p class="user-text">Вы будете возмещать, защищать и ограждать PHOENIXTV.RU и его дочерние компании, родительские и аффилированные компании, а также их и наших соответствующих директоров, должностных лиц, сотрудников и агентов от всех претензий, требований, претензий, убытков, издержек, обязательств и расходов, включая гонорары адвокатов, возникающих в связи с утверждениями о ваших действиях или бездействии, которые (независимо от того, будут ли они доказаны), представляют собой нарушение настоящего Соглашения.</p>
		<p class="user-text">6.3. Платежи</p>
		<p class="user-text">Вы можете выбрать любые предложения PHOENIXTV.RU, доступные в Сервисе, для разовой покупки или покупки на основе подписки. Любые покупки, сделанные в рамках Сервиса, не подлежат возврату, если иное не предусмотрено условиями покупки. Стоимость может включать в себя фиксированную плату, а также переменную плату за отдельные сделки или параметры использования. В той степени, в которой это разрешено применимым законодательством, подписки автоматически продлеваются в конце каждого периода подписки, если они не отменены заранее. Вы должны платить абонентскую плату при начале каждого периода продления.</p>
		<p class="user-text">Неиспользованный объем купленных благ не переносится на следующий период. Вы можете отменить автоматическое продление подписки в настройках своей учетной записи. Все платежи обрабатываются доступными платежными системами с учетом их условий и ограничений.</p>
		<p class="user-text">7. Срок действия и прекращение действия</p>
		<p class="user-text">Настоящее Соглашение вступает в силу с момента, когда вы впервые воспользуетесь нашим Сервисом, и действует до тех пор, пока вы пользуетесь нашим Сервисом или имеете учетную запись у нас, в зависимости от того, что имеет место дольше. PHOENIXTV.RU может расторгнуть настоящее Соглашение в любое время, направив уведомление за тридцать (30) дней, а пользователи могут прекратить действие в любое время, удалив свои учетные записи.</p>
		<p class="user-text">Если вы нарушите настоящее Соглашение, PHOENIXTV.RU может по своему усмотрению: (а) немедленно прекратить действие настоящего Соглашения с предварительным письменным уведомлением или без него; и (б) приостановить, удалить или ограничить доступ к вашей учетной записи или любую возможность просмотра любого контента через наш видеоплеер. Если PHOENIXTV.RU удалит вашу учетную запись за нарушение, вы не вправе зарегистрироваться повторно.</p>
		<p class="user-text">В случае расторжения или истечения срока действия Соглашения, следующие разделы останутся в силе: Раздел 6.2 (Возмещение), Раздел 8 (Заявление об ограничении ответственности), Раздел 9 (Ограничение ответственности), Раздел 10 (Споры, арбитраж и выбор закона) и Раздел 11 (Общие положения).</p>
		<p class="user-text">8. Заявление об ограничении ответственности</p>
		<p class="user-text">PHOENIXTV.RU ПРЕДОСТАВЛЯЕТ СЕРВИС НА УСЛОВИЯХ «КАК ЕСТЬ» И «ПО ДОСТУПНОСТИ». ВЫ ИСПОЛЬЗУЕТЕ СЕРВИС НА СВОЙ СТРАХ И РИСК. Вы должны использовать свое собственное устройство и доступ в Интернет.</p>
		<p class="user-text">ЗА ИСКЛЮЧЕНИЕМ ЯВНО УКАЗАННЫХ ЗДЕСЬ, И В СТЕПЕНИ, РАЗРЕШЕННОЙ ДЕЙСТВУЮЩИМ ЗАКОНОДАТЕЛЬСТВОМ, PHOENIXTV.RU ОТКАЗЫВАЕТСЯ ОТ ВСЕХ ГАРАНТИЙ, ЯВНЫХ ИЛИ ПОДРАЗУМЕВАЕМЫХ, ВКЛЮЧАЯ ПОДРАЗУМЕВАЕМЫЕ ГАРАНТИИ КОММЕРЧЕСКОЙ ЦЕННОСТИ, ПРИГОДНОСТИ И ОТСУТСТВИЯ НАРУШЕНИЙ. Помимо прочего, PHOENIXTV.RU не делает никаких заявлений и не дает никаких гарантий:</p>
		<ul>
			<li><p class="user-text">что наш Сервис или любая его часть будут доступны или разрешены в вашей юрисдикции, непрерывно или без ошибок, полностью безопасны или доступны со всех устройств или браузеров;</p></li>
			<li><p class="user-text">касаемо любого контента, представленного нашими пользователями, или действий наших пользователей;</p></li>
			<li><p class="user-text">что любое решение для гео-фильтрации или управления цифровыми правами, которое мы можем предложить, будет эффективным;</p></li>
			<li><p class="user-text">что наш Сервис будет соответствовать вашим деловым или профессиональным потребностям;</p></li>
			<li><p class="user-text">что мы будем продолжать поддерживать любую конкретную функцию или поддерживать обратную совместимость с любым сторонним программным обеспечением или устройством; или</p></li>
			<li><p class="user-text">относительно любых сторонних веб-сайтов и ресурсов.</p></li>
		</ul>
		<p class="user-text">9. Ограничение ответственности.</p>
		<p class="user-text">В СТЕПЕНИ, РАЗРЕШЕННОЙ ДЕЙСТВУЮЩИМ ЗАКОНОДАТЕЛЬСТВОМ:</p>
		<p class="user-text">(A) PHOENIXTV.RU НЕ НЕСЕТ ОТВЕТСТВЕННОСТИ ЗА КАКИЕ-ЛИБО КОСВЕННЫЕ, СЛУЧАЙНЫЕ, СПЕЦИАЛЬНЫЕ, НЕПРЯМЫЕ, КАРАТЕЛЬНЫЕ ИЛИ ПРИМЕРНЫЕ УБЫТКИ, ВКЛЮЧАЯ УБЫТКИ ЗА ПОТЕРЮ ДЕЛОВОЙ АКТИВНОСТИ, ПРИБЫЛИ, ДРУГИХ УБЫТКОВ, ДАЖЕ ЕСЛИ PHOENIXTV.RU БЫЛО ПРЕДУПРЕЖДЕНО О ВОЗМОЖНОСТИ ТАКИХ УБЫТКОВ;</p>
		<p class="user-text">И (B) ОБЩАЯ ОТВЕТСТВЕННОСТЬ PHOENIXTV.RU ПЕРЕД ВАМИ, ЗА ИСКЛЮЧЕНИЕМ ДОГОВОРНЫХ ОБЯЗАТЕЛЬСТВ ПО ОПЛАТЕ (ПРИ НАЛИЧИИ), НЕ ДОЛЖНА ПРЕВЫШАТЬ СУММЫ, УПЛАЧЕННЫЕ ВАМИ PHOENIXTV.RU ЗА ПРЕДШЕСТВУЮЩИЕ ДВЕНАДЦАТЬ (12) МЕСЯЦЕВ, ЛИБО 10 ДОЛЛАРОВ США, В ЗАВИСИМОСТИ ОТ ТОГО, ЧТО БОЛЬШЕ.</p>
		<p class="user-text">10. Споры, арбитраж и выбор права</p>
		<p class="user-text">Если вы по какой-либо причине недовольны нашим Сервисом, сначала свяжитесь с нами, чтобы мы могли попытаться решить ваши проблемы без необходимости помощи извне.</p>
		<p class="user-text">10.1. Выбор закона</p>
		<p class="user-text">Любые споры, связанные с настоящим Соглашением или использованием вами нашего Сервиса, будут регулироваться законами штата Нью-Йорк и Соединенных Штатов Америки (в отношении вопросов, подпадающих под федеральную юрисдикцию, таких как авторское право), без учета принципов коллизионного права.</p>
		<p class="user-text">10.2. Выбор места судебного разбирательства; Отказ от суда присяжных</p>
		<p class="user-text">За исключением вопросов, которые должны рассматриваться в арбитраже (как указано ниже), вы соглашаетесь с тем, что любые действия, связанные с настоящим Соглашением или использованием вами нашего Сервиса, должны быть инициированы в суде Санкт-Петербурга и Ленинградской области по местонахождению ответчика; вы соглашаетесь с исключительной юрисдикцией этого суда. В КАКИХ-ЛИБО ТАКИХ СУДЕБНЫХ СПОРАХ PHOENIXTV.RU И ВЫ ОТКАЗЫВАЕТЕСЬ ОТ ЛЮБОГО ПРАВА НА СУД ПРИСЯЖНЫХ.</p>
		<p class="user-text">11. Общие положения</p>
		<p class="user-text">11.1. Сохранение прав, делимость, форс-мажор: PHOENIXTV.RU оставляет за собой все права, прямо не предоставленные настоящим Соглашением. Права и средства защиты PHOENIXTV.RU являются совокупными. Отсутствие или задержка со стороны PHOENIXTV.RU в реализации какого-либо права не означает отказа от дальнейшего использования этого права. Если какое-либо условие настоящего Соглашения будет признано судом компетентной юрисдикции недействительным или не имеющим исковой силы, это условие будет ограничено или прервано.PHOENIXTV.RU не несет ответственности за задержку или отказ, вызванный форс-мажорными обстоятельствами.</p>
		<p class="user-text">11.2. Взаимоотношения: ни одна из сторон не является агентом, партнером или участником совместного предприятия. Настоящее Соглашение связывает стороны и их правопреемников, личных представителей и разрешенных правопреемников. Вы не можете уступить настоящее Соглашение любому лицу, учетная запись которого была прекращена PHOENIXTV.RU или которому запрещена регистрация; любая такая уступка будет недействительной.</p>
		<p class="user-text">11.3. Третьи стороны: мы можем предоставлять ссылки на другие веб-сайты и выполнять интеграцию с ними. Оператор веб-сайта, а не PHOENIXTV.RU, несет полную ответственность за его содержание, и использование вами каждого такого веб-сайта будет регулироваться его условиями обслуживания. Мы можем отключить интеграцию с любой третьей стороной в любое время с уведомлением или без него. За исключением случаев, прямо указанных в настоящем документе, ничто в настоящем Соглашении не дает никаких прав третьим лицам.</p>
		<p class="user-text">11.4. Полнота соглашения: Настоящее Соглашение представляет собой полное понимание сторон и заменяет все предыдущие договоренности относительно предмета настоящего Соглашения и не может быть изменено, кроме как в соответствии с Разделом 1 или в документе, составленном уполномоченными представителями PHOENIXTV.RU. Если у вас есть подписанное соглашение с PHOENIXTV.RU, любое противоречащее ему условие будет иметь преимущественную силу над условиями настоящего соглашения, но только в отношении предмета этого соглашения. Настоящее Соглашение составлено на русском и английском языке. Версии на других языках только для справки.</p>
		<p class="user-text">11.5. Уведомления: Вы должны направлять нам любые уведомления юридического характера по электронной почте <a class="user-link" href="mailto:juniorbasket@inbox.ru">juniorbasket@inbox.ru</a>  или по адресу, указанному в главе 12.</p>
		<p class="user-text">12. Автономная некоммерческая физкультурно-спортивная организация «Центр развития спортивных проектов «ФЕНИКС».</p>
		<p class="user-text">197375, Россия, Санкт-Петербург, ул. 2-я Алексеевская, д. 7, лит. А, пом. 27-Н, каб. 1.</p>

</div>
@endsection


</main>