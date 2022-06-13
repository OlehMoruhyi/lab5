
@extends("layout")

@section("content")
    <div class =content>

        <div class = container>


            <div class =content_text>
                @php
                if  (!(preg_match("/find/", url()->current()))){$url=url()->current()."/find";}
                else{$url=url()->current();}


                @endphp


                <b1>





                    <form action="{{$url}}" method="POST">
                        {{ csrf_field() }}
                        <b4>
                            <div class="block_find">
                                <input type="text" name="find" placeholder="Пошук" autocomplete="off">
                                <button type="submit"></button>
                            </div>
                        </b4></form>



                    <b5>

                        @foreach ($blocks as $block)
                            <div class="block3" id={{ "{$block->getId()}"}}>

                                <img src="{{ asset("/image/{$block->getImage()}") }}" alt="" />
                                {{"{$block->getName()}"}}
                            </div>
                        @endforeach

                    </b5>

                </b1>

            </div>
        </div>
    </div>
    </div>

@endsection
