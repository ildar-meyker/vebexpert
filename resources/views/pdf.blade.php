<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">

        <style>

            @page {
                margin: 0;
            }

            body { 
                padding: 1cm;
                background: #dfeffe;
                font-family: DejaVu Sans;
                font-size: 10pt;
                line-height: 1.5;
            }

         
            h3 {
                margin-bottom: 1.5em;
                font-size: 12pt;
                font-weight: bold;
                text-align: center;
            }

            p {
                margin: 1em 0;
                padding: 0;
            }

            .spacer-2 {
                height: 2pt;
            }


            .text-center {
                text-align: center;
            }


            .page-break {
                page-break-before: always;
            }

            .image-full {
                display: block;
                max-width: 100%;
                margin: 1.5em 0;
            }


            .page1__title {
                padding: 12em 0;
                font-size: 12pt;
                font-weight: bold;
                text-align: center;
            }

            .page1__author {
                max-width: 70%;
                margin: 0 auto;
                text-align: center;
            }

            .page1__author__name {
                font-weight: bold;
            }

            .page1__comment {
                position: absolute;
                bottom: 1cm;
                left: 1cm;
                right: 1cm;   
            }


            .heng-table {
                width: 100%;
                margin: 2.5em 0;
            }

            .heng-table th {
                padding-bottom: .3em;
                vertical-align: top;
                text-align: left;
                
            }

            .heng-table td {
                padding-bottom: .3em;
                vertical-align: top;
            }

            .heng-table td:last-child {
                text-align: center;
            }

            #watermark {
                position: fixed;
                bottom: 1.5cm;
                left: 1cm;
                right: 1cm;
                z-index: -1000;
                font-size: .8em;
            }

            #watermark * {
                display: inline-block;
                vertical-align: middle;
                margin-right: 5px;
                opacity: 0.7;
            }
            
        </style>
        
    </head>
    <body>

        <div id="watermark">
            <span>Клинический случай подготовлен при поддержке </span>
            <img src="data:image/png;base64,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
" alt="Vebexpert">
        </div>

        {{--  page 1 --}}
        <div class="page1__title">
            {{ $step1['Название клинического случая'] }}
        </div>

        <div class="page1__author">
            <div class="page1__author__name">
                {{ $step1['Фамилия'] }} {{ $step1['Имя'] }} {{ $step1['Отчество'] }}
            </div>
            <div class="page1__author__info">
                {{ $step1['Должность'] }} {{ $step1['Место работы'] }} {{ $step1['Город'] }}
            </div>
            <div class="page1__author__date">
                {{ \Date::parse($step1['Дата'])->format('d.m.Y') }}
            </div>
        </div>

        <div class="page1__comment">
            Комментарий: {{ $step1['Комментарий'] }}
        </div>
        {{-- /page 1 --}}

        <div class="page-break"></div>

        {{--  page 2 --}}
        <div class="article">
            <p>
                @if ($step2['Пол'] == 'Женский')
                    Пациентка
                    {{ $step2['Инициалы'] }},
                    {{ $step2['Год рождения'] }}
                    г.р. считает себя больной с
                    {{ $step2['Болен с месяца'] }}
                    {{ $step2['Болен с года'] }} г.,
                    когда впервые появились жалобы на
                    {{ $step2['Описание жалоб'] }}.
                    <br>Пациентка обратилась к врачу по месту жительства. 
                @else
                    Пациент
                    {{ $step2['Инициалы'] }},
                    {{ $step2['Год рождения'] }}
                    г.р. считает себя больным с
                    {{ $step2['Болен с месяца'] }}
                    {{ $step2['Болен с года'] }} г.,
                    когда впервые появились жалобы на
                    {{ $step2['Описание жалоб'] }}.
                    <br>Пациент обратился к врачу по месту жительства. 
                @endif
               
            </p>

            <p>
                При обследовании выявлено:
            </p>

            @foreach ($step2['Обследования'] as $test)
                @if ( !empty($test['Дата']) )
                    <p>
                        <b>{{ $test['Тип'] }} {{ $test['Объект'] }} ({{ \Date::parse($test['Дата'])->format('d.m.Y') }}):</b>
                        <br>{{ $test['Описание и заключение'] }}
                    </p>
                @endif
            @endforeach

            @if ( !empty($step2['Рентгенография']['Дата']) )
                <p>
                    <b>Рентгенография органов грудной клетки ({{ \Date::parse($step2['Рентгенография']['Дата'])->format('d.m.Y') }})</b>
                    <br>{{ $step2['Рентгенография']['Описание и заключение'] }}
                </p>
            @endif

            @if ( !empty($step2['Сцинтиграфия']['Дата']) )
                <p>
                    <b>Сцинтиграфия костей ({{ \Date::parse($step2['Сцинтиграфия']['Дата'])->format('d.m.Y') }})</b>
                    <br>{{ $step2['Сцинтиграфия']['Описание и заключение'] }}
                </p>
            @endif

            @if ( !empty($step2['Биопсия']['Дата']) )
                <p>
                    <b>Проведена диагностическая биопсия
                    {{ $step2['Биопсия']['Объект'] }} ({{ \Date::parse($step2['Биопсия']['Дата'])->format('d.m.Y')  }})</b>
                    <br>{{ $step2['Биопсия']['Описание и заключение'] }}
                </p>
            @endif

        </div>

        <div class="article">
        
            <h3>Лабораторные исследования</h3>

            <p><b>Общий анализ крови</b></p>

            <p>ER {{ $step2['ОАК']['ER'] }} 1012/л </p>

            <p>Hb {{ $step2['ОАК']['Hb'] }} г/л</p>
            
            <p>Le {{ $step2['ОАК']['Le'] }} 109/л</p>
            
            <p>Tr {{ $step2['ОАК']['Tr'] }} 109/л</p>
            
            <p>СОЭ {{ $step2['ОАК']['СОЭ'] }} мм/ч</p>
            
            <p>п/я {{ $step2['ОАК']['п/я'] }} %</p>
            
            <p>с/я {{ $step2['ОАК']['с/я'] }} %</p>
            
            <p>Ly {{ $step2['ОАК']['Ly'] }} %</p>
            
            <p>Mo {{ $step2['ОАК']['Mo'] }} %</p>
            
            <p>Bas {{ $step2['ОАК']['Bas'] }} %</p>
            
            <p>Эо {{ $step2['ОАК']['Эо'] }} %</p>

            <p>Миелоциты {{ $step2['ОАК']['Миелоциты'] }} %</p>
            
            <p>Метамиел {{ $step2['ОАК']['Метамиел'] }} %</p>
            
            <p>АсАт {{ $step2['ОАК']['АсАт']['Значение'] }} Eд/л 
                (N = {{ $step2['ОАК']['АсАт']['N'] }} Eд/л)</p>
            
            <p>АлАт {{ $step2['ОАК']['АлАт']['Значение'] }} Eд/л 
                (N = {{ $step2['ОАК']['АлАт']['N'] }} Eд/л)</p>
            
            <p>ЛДГ {{ $step2['ОАК']['ЛДГ']['Значение'] }} Eд/л 
                (N = {{ $step2['ОАК']['ЛДГ']['N'] }} Eд/л)</p>
            
            <p>Скорректированный Ca2+ {{ $step2['ОАК']['Скорректированный Ca2+']['Значение'] }} мМ/л 
                (N = {{ $step2['ОАК']['Скорректированный Ca2+']['N'] }} Eд/л)</p>
            
            <p>Мочевина крови {{ $step2['ОАК']['Мочевина крови']['Значение'] }} мМ/л 
                (N = {{ $step2['ОАК']['Мочевина крови']['N'] }} Eд/л)</p>
            
            <p>Креатинин крови {{ $step2['ОАК']['Креатинин крови']['Значение'] }} мМ/л 
                (N = {{ $step2['ОАК']['Креатинин крови']['N'] }} Eд/л)</p>
            
            <p>Общий белок {{ $step2['ОАК']['Общий белок']['Значение'] }} г/л 
                (N = {{ $step2['ОАК']['Общий белок']['N'] }} Eд/л)</p>

        </div>
        {{-- /page 2 --}}


        {{--  page 3 --}}
        <div class="article">
            <h3>
                Критерии оценки прогноза ПКР по D. Heng*
            </h3>
            
            <table class="heng-table">
                <tr>
                    <th>Факторы риска</th>
                    <th>Значение показателя</th>
                    <th>Наличие факторов</th>
                </tr>
                <tr>
                    <td>Индекс Карновского (Шкала ECOG)</td>
                    <td>&lt; 80% (&gt; 1)</td>
                    <td>{{ $step3['Индекс Карновского (Шкала ECOG)'] }}</td>
                </tr>
                <tr>
                    <td>Время от постановки диагноза до начала терапии</td>
                    <td>менее 12 месяцев</td>
                    <td>{{ $step3['Время от постановки диагноза до начала терапии'] }}</td>
                </tr>
                <tr>
                    <td>Уровень гемоглобина</td>
                    <td>&lt; нижней границы нормы</td>
                    <td>{{ $step3['Уровень гемоглобина'] }}</td>
                </tr>
                <tr>
                    <td>Уровень лактатдегидрогеназы</td>
                    <td>До 1000 Ед/л</td>
                    <td>{{ $step3['Уровень лактатдегидрогеназы'] }}</td>
                </tr>
                <tr>
                    <td>Уровень скорректированного кальция</td>
                    <td>&gt; 10 мг/дл (или 2,5 ммоль/л)</td>
                    <td>{{ $step3['Уровень скорректированного кальция'] }}</td>
                </tr>
                <tr>
                    <td>Уровень нейтрофилов</td>
                    <td>&gt; 6,5 х 109/л</td>
                    <td>{{ $step3['Уровень нейтрофилов'] }}</td>
                </tr>
                <tr>
                    <td>Уровень тромбоцитов</td>
                    <td>&gt; 320 х 109/л</td>
                    <td>{{ $step3['Уровень тромбоцитов'] }}</td>
                </tr>
                <tr>
                    <td>Наличие метастатических очагов</td>
                    <td>{{ $step3['Количество Meta'] }}</td>
                    <td>{{ $step3['Наличие метастатических очагов'] }}</td>
                </tr>
            </table>

            <p>
                <b>Заключение:</b> В данном случае имеет место
                {{ $step3['Прогноз по MSKCC'] }} прогноз по MSKCC.  
            </p>

            @foreach ($step3_images as $image)
                <img src="{{ $image }}" alt="" class="image-full">
            @endforeach

            <p>
                Комментарий: {{ $step3['Комментарий'] }}
            </p>
        </div>
        
        {{-- /page 3 --}}


        {{--  page 4 --}}
        <div class="article">
            <p>
                {{ $step2['Пол'] === 'Женщина' ? 'Пациентке' : 'Пациенту' }} 
                была проведена операция по удалению первичной опухоли:
                <b>{{ $step4['Проведена операция'] }} </b>

                @if ( $step4['Проведена операция'] === 'Да')
                    <br>Выполнена
                    {{ $step4['Нефрэктомия']['Вид'] }} нефрэктомия
                    {{ $step4['Нефрэктомия']['Способ'] }} ({{ \Date::parse($step4['Нефрэктомия']['Дата'])->format('d.m.Y')  }})
                    
                    <br>Выполнена биопсия операционного материала. Проведено гистологическое исследование:
                    
                    <br>{{ $step4['Гистологическое исследование'] }}
                @endif
            </p>

            <p>
                <b>Таким образом, на основании данных обследования установлен диагноз:</b>
                
                <br>{{ $step4['Диагноз'] }}
            </p>

            <p>
                <b>Сопутствующие заболевания:</b>
            </p>

            <p>
                @foreach ($step4['Сопутствующие заболевания'] as $disease)
                    - {{ $disease['Диагноз'] }}<br>
                @endforeach
            </p>
        </div>
        {{-- /page 4 --}}

        {{--  page 5 --}}
        <div class="article">
            <h3>Терапия</h3>
            
            <p>
                Химиотерапевтическое лечение было начато через <b>{{ $step5['Лечение начато через']}}</b>
                месяцев с момента постановки диагноза.
            </p>

            @foreach ($step5['Линии терапии'] as $index => $therapy)
                <p>
                    В качестве {{ $index + 1 }}-й линии начат прием: <b>{{ $therapy['Препарат'] }}</b>.
                
                    <br>Выбор данной терапевтической опции обусловлен: 
                    
                    <br><b>{{ $therapy['Обоснование выбора'] }}</b>
                    
                    <br>На фоне проводимой терапии состояние пациента: <b>{{ $therapy['Изменение состояния'] }}</b>.
                    
                    @if ($therapy['Изменение состояния'] === 'ухудшилось')

                        {{--  Ухудшение связано с --}}
                        @if ( $therapy['Ухудшение связано с'] === 'развитием побочных эффектов' )

                            <br>Ухудшение состояния связано с <b>{{ $therapy['Ухудшение связано с'] }}, таких как:
                            <br><b>{{ $therapy['Побочные эффекты'] }}</b>
                        
                        @elseif ( $therapy['Ухудшение связано с'] === 'прогрессированием заболевания' )

                            <br>Ухудшение состояния связано с <b>{{ $therapy['Ухудшение связано с'] }}.

                        @endif
                        {{-- /Ухудшение связано с --}}
                        

                        {{--  Принято решение о --}}
                        @if ( $therapy['Принято решение о'] === 'снижении дозы препарата' )
                            
                            <br>Было принято решение о <b>{{ $therapy['Принято решение о'] }}</b>,
                            с  <b>{{ $therapy['Cнижение дозы препарата']['c'] }}</b> мг. 
                            до <b>{{ $therapy['Cнижение дозы препарата']['до'] }}</b> мг.
                        
                        @elseif ( $therapy['Принято решение о'] === 'временной отмене препарата' )

                            <br>Было принято решение о <b>{{ $therapy['Принято решение о'] }}</b>.

                        @endif
                        {{-- /Принято решение о --}}

                        {{--  Лечение было --}}
                        @if ( $therapy['Лечение было'] === 'возобновлено') 

                            <br>Лечение было {{ $therapy['Лечение было'] }}
                            через <b>{{ $therapy['Лечение возобновлено']['через'] }}</b> недель 
                            в дозе <b>{{ $therapy['Лечение возобновлено']['в дозе'] }}</b> мг.
                        
                        @elseif ( $therapy['Лечение было'] === 'отклонено') 
                        
                            <br>Лечение было {{ $therapy['Лечение было'] }}.
                        
                        @endif 
                        {{-- /Лечение было --}}

                        <br>{{ $therapy['Комментарий'] }}
                        
                    @endif
                </p>

                <p>
                    При проведении контрольного обследования выявлено по данным:
                </p>

                @foreach ($therapy['Обследования'] as $test)
                    @if ( !empty($test['Дата']) )
                        <p>
                            <b>{{ $test['Тип'] }} {{ $test['Объект'] }} ({{ \Date::parse($test['Дата'])->format('d.m.Y') }}):</b>
                            <br>{{ $test['Описание и заключение'] }}
                        </p>
                    @endif
                @endforeach

                @if ( !empty($therapy['Рентгенография']['Дата']) )
                    <p>
                        <b>Рентгенография органов грудной клетки ({{ \Date::parse($therapy['Рентгенография']['Дата'])->format('d.m.Y')  }})</b>
                        <br>{{ $therapy['Рентгенография']['Описание и заключение'] }}
                    </p>
                @endif

                @if ( !empty($therapy['Сцинтиграфия']['Дата']) )
                    <p>
                        <b>Сцинтиграфия костей ({{ \Date::parse($therapy['Сцинтиграфия']['Дата'])->format('d.m.Y')  }})</b>
                        <br>{{ $therapy['Сцинтиграфия']['Описание и заключение'] }}
                    </p>
                @endif

                @if ( !empty($therapy['Биопсия']['Дата']) )
                    <p>
                        <b>Проведена диагностическая биопсия
                        {{ $therapy['Биопсия']['Объект'] }} ({{ \Date::parse($therapy['Биопсия']['Дата'])->format('d.m.Y')   }})</b>
                        <br>{{ $therapy['Биопсия']['Описание и заключение'] }}
                    </p>
                @endif

                @if ( isset($step5_images[$index] ) )
                    @foreach ($step5_images[$index] as $image)
                        <img src="{{ $image }}" alt="" class="image-full">
                    @endforeach
                @endif
        
                <h3>Лабораторные исследования</h3>

                <p><b>Общий анализ крови</b></p>

                <p>ER {{ $therapy['ОАК']['ER'] }} 1012/л </p>

                <p>Hb {{ $therapy['ОАК']['Hb'] }} г/л</p>
                
                <p>Le {{ $therapy['ОАК']['Le'] }} 109/л</p>
                
                <p>Tr {{ $therapy['ОАК']['Tr'] }} 109/л</p>
                
                <p>СОЭ {{ $therapy['ОАК']['СОЭ'] }} мм/ч</p>
                
                <p>п/я {{ $therapy['ОАК']['п/я'] }} %</p>
                
                <p>с/я {{ $therapy['ОАК']['с/я'] }} %</p>
                
                <p>Ly {{ $therapy['ОАК']['Ly'] }} %</p>
                
                <p>Mo {{ $therapy['ОАК']['Mo'] }} %</p>
                
                <p>Bas {{ $therapy['ОАК']['Bas'] }} %</p>
                
                <p>Эо {{ $therapy['ОАК']['Эо'] }} %</p>

                <p>Миелоциты {{ $therapy['ОАК']['Миелоциты'] }} %</p>
                
                <p>Метамиел {{ $therapy['ОАК']['Метамиел'] }} %</p>
                
                <p>АсАт {{ $therapy['ОАК']['АсАт']['Значение'] }} Eд/л 
                    (N = {{ $therapy['ОАК']['АсАт']['N'] }} Eд/л)</p>
                
                <p>АлАт {{ $therapy['ОАК']['АлАт']['Значение'] }} Eд/л 
                    (N = {{ $therapy['ОАК']['АлАт']['N'] }} Eд/л)</p>
                
                <p>ЛДГ {{ $therapy['ОАК']['ЛДГ']['Значение'] }} Eд/л 
                    (N = {{ $therapy['ОАК']['ЛДГ']['N'] }} Eд/л)</p>
                
                <p>Скорректированный Ca2+ {{ $therapy['ОАК']['Скорректированный Ca2+']['Значение'] }} мМ/л 
                    (N = {{ $therapy['ОАК']['Скорректированный Ca2+']['N'] }} Eд/л)</p>
                
                <p>Мочевина крови {{ $therapy['ОАК']['Мочевина крови']['Значение'] }} мМ/л 
                    (N = {{ $therapy['ОАК']['Мочевина крови']['N'] }} Eд/л)</p>
                
                <p>Креатинин крови {{ $therapy['ОАК']['Креатинин крови']['Значение'] }} мМ/л 
                    (N = {{ $therapy['ОАК']['Креатинин крови']['N'] }} Eд/л)</p>
                
                <p>Общий белок {{ $step2['ОАК']['Общий белок']['Значение'] }} г/л 
                (N = {{ $step2['ОАК']['Общий белок']['N'] }} Eд/л)</p>

                <div class="spacer-2"></div>

                <p>
                    Констатировано наличие <b>{{ $therapy['Констатировано наличие']}}</b>.
                </p>
 
            @endforeach

            <div class="spacer-2"></div>

            <p>
                Комментарий: <b>{{ $step5['Комментарий'] }}</b>.
            </p>

            @if (isset($step5['Копирайт']))
                <p>
                    Данный клинический случай может быть представлен на образовательных мероприятиях:
                </p>
                <p>
                    @foreach ($step5['Копирайт'] as $copyright)
                        - <b>{{ $copyright }}</b><br>                         
                    @endforeach
                </p>
            @endif
            
        </div>   
        {{-- /page 5 --}}


    </body>
</html>
