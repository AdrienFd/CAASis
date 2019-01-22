@extends('layout')


@section('content')
<div>
    <div class="event">

        <div class="img_right">
            <img src="/img/img_event1.jpg" alt="Photo de l'exia party">
        </div>
        <div class="description_left">
            <div class="bloc_left">
                <h2>TITRE DE L'EVENEMENT</h2>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                    Accusantium autem, qui, aperiam porro cum omnis possimus cumque unde adipisci nemo provident
                    asperiores sit animi consequuntur iste suscipit ad fuga maxime.</p>
                <a href="event_description">LIRE LA SUITE</a>
            </div>
        </div>

    </div>

    <div class="event">
        <div class="img_left">
            <img src="/img/img_event2.jpg" alt="Photo de foot">
        </div>
        <div class="description_right">
            <div class="bloc_right">
                <h2>TITRE DE L'EVENEMENT 2</h2>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                    Accusantium autem, qui, aperiam porro cum omnis possimus cumque unde adipisci nemo provident
                    asperiores sit animi consequuntur iste suscipit ad fuga maxime.</p>
                <a href="event_description">LIRE LA SUITE</a>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
