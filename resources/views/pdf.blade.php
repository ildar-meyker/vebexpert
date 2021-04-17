<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">

        <style>
            body { 
                font-family: DejaVu Sans;
                font-size: 10pt;
            }

            h3 {
                font-size: 12pt;
                font-weight: bold;
            }

            p {
                margin: 1.5em 0;
                padding: 0;
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
                padding: 8em 0;
                font-size: 14pt;
                font-weight: bold;
                text-align: center;
            }

            .page1__author {
                max-width: 30%;
                margin: 0 auto;
                font-size: 12pt;
                text-align: center;
            }

            .page1__author__name {
                font-weight: bold;
            }

            .page1__comment {
                position: absolute;
                bottom: 0;
                left: 0;
                right: 0;   
            }


            .heng-table {
                width: 100%;
                margin: 3em 0;
            }

            .heng-table th {
                padding-bottom: .5em;
                vertical-align: top;
                text-align: left;
                
            }

            .heng-table td {
                padding-bottom: .5em;
                vertical-align: top;
            }

            .heng-table td:last-child {
                text-align: center;
            }

            
        </style>
        
    </head>
    <body>


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
                {{ $step1['Дата'] }}
            </div>
        </div>

        <div class="page1__comment">
            {{ $step1['Комментарий'] }}
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
                    когда в первые появились жалобы на
                    {{ $step2['Описание жалоб'] }}.
                    <br>Пациентка обратилась к врачу по месту жительства. 
                @else
                    Пациент
                    {{ $step2['Инициалы'] }},
                    {{ $step2['Год рождения'] }}
                    г.р. считает себя больным с
                    {{ $step2['Болен с месяца'] }}
                    {{ $step2['Болен с года'] }} г.,
                    когда в первые появились жалобы на
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
                        <b>{{ $test['Тип'] }} {{ $test['Объект'] }} ({{ $test['Дата'] }}):</b>
                        <br>{{ $test['Описание и заключение'] }}
                    </p>
                @endif
            @endforeach

            @if ( !empty($step2['Рентгенография']['Дата']) )
                <p>
                    <b>Рентгенография органов грудной клетки ({{ $step2['Рентгенография']['Дата'] }})</b>
                    <br>{{ $step2['Рентгенография']['Описание и заключение'] }}
                </p>
            @endif

            @if ( !empty($step2['Сцинтиграфия']['Дата']) )
                <p>
                    <b>Сцинтиграфия костей ({{ $step2['Сцинтиграфия']['Дата'] }})</b>
                    <br>{{ $step2['Сцинтиграфия']['Описание и заключение'] }}
                </p>
            @endif

            @if ( !empty($step2['Биопсия']['Дата']) )
                <p>
                    <b>Проведена диагностическая биопсия
                    {{ $step2['Биопсия']['Объект'] }} ({{ $step2['Биопсия']['Дата']  }})</b>
                    <br>{{ $step2['Биопсия']['Описание и заключение'] }}
                </p>
            @endif

        </div>

        <div class="article">
        
            <h3>Лабораторные исследования</h3>

            <p><b>Общий анализ крови</b></p>

            <p>
                ER {{ $step2['ОАК']['ER'] }} 1012/л 

                <br>Hb {{ $step2['ОАК']['Hb'] }} г/л 

                <br>Le {{ $step2['ОАК']['Le'] }} 109/л  

                <br>Tr {{ $step2['ОАК']['Tr'] }} 109/л  

                <br>СОЭ {{ $step2['ОАК']['СОЭ'] }} мм/ч

                <br>п/я {{ $step2['ОАК']['п/я'] }} %

                <br>с/я {{ $step2['ОАК']['с/я'] }} %

                <br>Ly {{ $step2['ОАК']['Ly'] }} %

                <br>Mo {{ $step2['ОАК']['Mo'] }} %

                <br>Bas {{ $step2['ОАК']['Bas'] }} %

                <br>Эо {{ $step2['ОАК']['Эо'] }} %

                <br>АсАт {{ $step2['ОАК']['АсАт']['Значение'] }} Eд/л 
                    (N = {{ $step2['ОАК']['АсАт']['N'] }} Eд/л)

                <br>АлАт {{ $step2['ОАК']['АлАт']['Значение'] }} Eд/л 
                    (N = {{ $step2['ОАК']['АлАт']['N'] }} Eд/л)

                <br>ЛДГ {{ $step2['ОАК']['ЛДГ']['Значение'] }} Eд/л 
                    (N = {{ $step2['ОАК']['ЛДГ']['N'] }} Eд/л)

                <br>Скорректированный Ca2+ {{ $step2['ОАК']['Скорректированный Ca2+']['Значение'] }} мМ/л 
                    (N = {{ $step2['ОАК']['Скорректированный Ca2+']['N'] }} Eд/л)

                <br>Мочевина крови {{ $step2['ОАК']['Мочевина крови']['Значение'] }} мМ/л 
                    (N = {{ $step2['ОАК']['Мочевина крови']['N'] }} Eд/л)

                <br>Креатинин крови {{ $step2['ОАК']['Креатинин крови']['Значение'] }} мМ/л 
                    (N = {{ $step2['ОАК']['Креатинин крови']['N'] }} Eд/л)

                <br>Миелоциты {{ $step2['ОАК']['Миелоциты'] }} %
                
                <br>Метамиел {{ $step2['ОАК']['Метамиел'] }} %
            </p>

        </div>
        {{-- /page 2 --}}

        <div class="page-break"></div>

        {{--  page 3 --}}
        <h3 class="text-center">
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

        <div class="article">
            <p>
                {{ $step3['Комментарий'] }}
            </p>
        </div>
        
        {{-- /page 3 --}}

    </body>
</html>
