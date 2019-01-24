@extends('includes.layout')

@section('header')
    @include('includes.header')
@endsection

@section('main')
<div id="goBack">

</div>


<div class="presentation">
    <h2>TITRE DE L'EVENEMENT</h2>

    <div class="first_bloc">
        <div class="images">
            <img src="/img/events_img/img1_event1.jpg" alt="Première photo de l'exia Party">
            <button href="comment" class="comment_button">Click to comment</button>
        </div>
        <div class="image_list">
            <img href="event_presentation" src="/img/events_img/img2_event1.jpg" alt="Second Picture">
            <img href="event_presentation" src="/img/events_img/img3_event1.jpg" alt="Third Picture">
            <img href="event_presentation" src="/img/events_img/img2_event1.jpg" alt="Fourth Picture">
        </div>
        <div class="event_description">
            <h2>PRESENTATION</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
                Molestias necessitatibus perspiciatis expedita beatae deserunt, sed ipsa quasi, inventore eos velit
                pariatur et.
                Minima in exercitationem est possimus mollitia quisquam nihil!</p>
            <div class="event_price">10 Euros</div>
            <button class="participate_button">I participate</button>
        </div>
    </div>

    <div class="last_comment">
        <h2>LAST COMMENT</h2>
        <div class="comment_img1">
            <h3>Auteur: BDE_MEMBER</h3>
            Lorem, ipsum dolor sit amet consectetur adipisicing elit.
            Eaque totam est aliquid minus. Excepturi quos cupiditate velit
            tempore iste, rerum maiores eum quaerat, neque nam obcaecati dolorem inventore, consequuntur laboriosam?
        </div>

        <div class="comment_img2">
            <h3>Auteur: BDE_MEMBER</h3>
            Lorem ipsum dolor sit amet consectetur adipisicing elit.
            Qui voluptatem obcaecati consequuntur quasi explicabo sed asperiores necessitatibus nobis ipsam beatae. Ad,
            et natus.
            Molestias provident tempore quia accusamus, assumenda repudiandae.
        </div>

        <div class="comment_img3">
            <h3>Auteur: BDE_MEMBER</h3>
            Lorem, ipsum dolor sit amet consectetur adipisicing elit.
            Eaque totam est aliquid minus. Excepturi quos cupiditate velit
            tempore iste, rerum maiores eum quaerat, neque nam obcaecati dolorem inventore, consequuntur laboriosam?
        </div>
    </div>
</div>
@endsection
