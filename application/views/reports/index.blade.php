@layout('layouts.default')

@section('content')
    <h1>Система отчётов для CRM</h1>
    {{ Form::open('reports/view', 'POST') }}
    <div style="float: left;">
        <table width="300px" border="1px">
            <tbody>
            <tr>
                <td>
                </td>
                <td>
                    ФИО:
                </td>
            </tr>
            <tr>
                <td>
                    {{ Form::checkbox( 'all_users', 'true') }}
                </td>
                <td>
                    Выбрать всех
                </td>
            </tr>
            @foreach($users as $user)
            <tr>
                <td>
                    {{ Form::checkbox( $user->id, 'true') }}
                    </td>
                <td>
                    {{ $user->last_name }}
                    {{ $user->first_name }}</td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div>
        <p>
            <b>От:</b>
            {{ Form::label('Ystart','Год:') }}
            {{ Form::select('Ystart', array('2012'=>'2012','2013'=>'2013'))}}
            {{ Form::label('Mstart','Месяц:') }}
            {{ Form::select('Mstart', array('01'=>' Январь','02'=>'Февраль','03'=>'Март','04'=>'Апрель','05'=>'Май','06'=>'Июнь','07'=>'Июль','08'=>'Август','09'=>'Сентябрь','10'=>'Октябрь','11'=>'Ноябрь','12'=>'Декабрь'))}}
            {{ Form::label('Dstart','День:') }}
            {{ Form::text('Dstart') }}
        </p>
        <p>
            <b>До:</b>
            {{ Form::label('Yend','Год:') }}
            {{ Form::select('Yend', array('2012'=>'2012','2013'=>'2013'))}}
            {{ Form::label('Mend','Месяц:') }}
            {{ Form::select('Mend', array('01'=>' Январь','02'=>'Февраль','03'=>'Март','04'=>'Апрель','05'=>'Май','06'=>'Июнь','07'=>'Июль','08'=>'Август','09'=>'Сентябрь','10'=>'Октябрь','11'=>'Ноябрь','12'=>'Декабрь'))}}
            {{ Form::label('Dend','День:') }}
            {{ Form::text('Dend') }}
        </p>
        <p>
            {{ Form::label('accounts_check','Контрагенты') }}
            {{ Form::checkbox('accounts_check', true, true)}}<br / >
            {{ Form::label('contacts_check','Контакты') }}
            {{ Form::checkbox('contacts_check', true, true)}}
        </p>
        <p>
        {{ Form::submit('Сформировать') }}
        {{ Form::close() }}
        </p>
    </div>
    
@endsection