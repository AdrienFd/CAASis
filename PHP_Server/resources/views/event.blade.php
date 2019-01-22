@extends('layout')


@section('content')
<div>
    <div class="event">
        <div class="event_img">
            <img src="/img/img_event1.jpg" alt="Photo de l'exia party">
        </div>
        <div class="event_description">
            <div class="bloc">
                <h2>TITRE DE L'EVENEMENT</h2>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                    Accusantium autem, qui, aperiam porro cum omnis possimus cumque unde adipisci nemo provident
                    asperiores sit animi consequuntur iste suscipit ad fuga maxime.</p>
                <a href="event_description">LIRE LA SUITE</a>
            </div>
        </div>

    </div>

    <div class="event">
        <div class="event_img">
            <img src="/img/img_event2.jpg" alt="Photo de foot">
        </div>
        <div class="event_description">
            <div class="bloc">
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
