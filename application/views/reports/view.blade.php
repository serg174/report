@layout('layouts.default')

@section('content')
    <p>Отчёт по ользователям с {{$results['date_start'] }} по {{$results['date_end'] }}</p>
    @foreach($results['user'] as $dop_result)
        <h2>{{ $dop_result['last_name'] }} {{ $dop_result['first_name'] }}</h2>
        @if(isset($results['accounts'][$dop_result['id']]))
            <div>
                <h3>Контрагенты</h3>
                <table>
                    <tbody>
                        @foreach($results['accounts'][$dop_result['id']] as $result)
                            <tr>
                                <td>
                                    {{ $result->name }}
                                </td>
                                <td>
                                    {{ $result->date_entered }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
        @if(isset($results['contacts'][$dop_result['id']]))
            <div>
                <h3>Контакты</h3>
                <table>
                    <tbody>
                        @foreach($results['contacts'][$dop_result['id']] as $result)
                            <tr>
                                <td>
                                    {{ $result->last_name }}{{ $result->first_name }}
                                </td>
                                <td>
                                    {{ $result->date_entered }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    @endforeach
@endsection