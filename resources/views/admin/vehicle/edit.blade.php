@extends("layouts.dashboard")
@section('content')
    <!-- Start content -->
    <div class="content">
        <div class="container">

            <div class="row">
                <h3 class="text-center">Edit Vehicle </h3>
                <div class="col-sm-12">
                    <div class="card-box">
                        
                        <form class="form-horizontal" role="form" enctype="multipart/form-data" method="post"
                            action="{{ route('update-vehicle', [$vehicle->id]) }}">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6">

                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Brand:</label>
                                        <div class="col-md-10">
                                            <Select class="form-control" name="brand_id">
                                                @foreach ($brand as $b)
                                                    @if ($vehicle->brand_id == $b->id)
                                                        <option value="{{ $b->id }}" selected="selected">
                                                            {{ $b->name }}</option>
                                                    @else
                                                        <option value="{{ $b->id }}">{{ $b->name }}</option>
                                                    @endif
                                                @endforeach

                                            </Select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-2 control-label" style=" padding-right: 10px;"> Engine_Force:
                                        </label>
                                        <div class="col-md-10">
                                            <input required type="string" type="text" name="engine_force"
                                                class="form-control" placeholder="Engine Force..."
                                                value="{{ $vehicle->engine_force }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Fule:</label>
                                        <div class="col-md-10">
                                            <Select class="form-control" name="fuel">
                                                @if ($vehicle->fuel == 'BENZIN')
                                                    {<option value="BENZIN" selected="selected">BENZIN</option>
                                                    <option value="DISEL">DISEL</option>
                                                    <option value="ELICTRIC">ELICTRIC</option>
                                                    <option value="OTHER">OTHER</option>}
                                                @elseif($vehicle->fuel=="DISEL")
                                                    {<option value="BENZIN">BENZIN</option>
                                                    <option value="DISEL" selected="selected">DISEL</option>
                                                    <option value="ELICTRIC">ELICTRIC</option>
                                                    <option value="OTHER">OTHER</option>}
                                                @elseif($vehicle->fuel=="ELICTRIC")
                                                    {<option value="BENZIN">BENZIN</option>
                                                    <option value="DISEL">DISEL</option>
                                                    <option value="ELICTRIC" selected="selected">ELICTRIC</option>
                                                    <option value="OTHER">OTHER</option>}
                                                @elseif($vehicle->fuel=="OTHER")
                                                    {<option value="BENZIN">BENZIN</option>
                                                    <option value="DISEL">DISEL</option>
                                                    <option value="ELICTRIC">ELICTRIC</option>
                                                    <option value="OTHER" selected="selected">OTHER</option>}
                                                @endif
                                            </Select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Kilometrage:</label>
                                        <div class="col-md-10">
                                            <input required type="string" type="text" class="form-control"
                                                placeholder="Kilometrage..." name="kilometrage"
                                                value="{{ $vehicle->kilometrage }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Descripton:</label>
                                        <div class="col-md-10">
                                            <textarea required type="string" class="form-control" rows="3"
                                                placeholder="Descripton..."
                                                name="description">{{ $vehicle->description }}</textarea>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-2 control-label">country:</label>
                                        <div class="col-md-10">
                                            <input required type="string" type="text" class="form-control"
                                                placeholder="origin-country..." name="origin_country"
                                                value="{{ $vehicle->origin_country }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">isAvailable:</label>
                                        <div class="col-md-10">
                                            <Select class="form-control" name="is_available">
                                                @if ($vehicle->is_available == 0)
                                                    { <option value="1">true</option>
                                                    <option value="0" selected="selected">false</option>
                                                    }
                                                @else
                                                    {
                                                    <option value="1" selected="selected">true</option>
                                                    <option value="0">false</option>
                                                    }
                                                @endif



                                            </Select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">specialOffer:</label>
                                        <div class="col-md-10">
                                            <Select class="form-control" name="special_offer_id">

                                                @foreach ($offers as $offer)
                                                    @if ($vehicle->special_offer_id == $offer->id)
                                                        <option value="{{ $offer->id }}" selected="selected">
                                                            {{ $offer->ratio }}%</option>
                                                    @else
                                                        <option value="{{ $offer->id }}">{{ $offer->ratio }}%</option>
                                                    @endif
                                                @endforeach



                                            </Select>
                                        </div>
                                    </div>



                                    <div class="form-group">
                                        <label class="col-md-2 control-label">images:</label>
                                        <div class="col-md-10">
                                            <input type="file" class="form-control" name="images[]" placeholder="address"
                                                multiple>
                                        </div>
                                    </div>
                                </div><!-- end col -->

                                <div class="col-lg-6">

                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Price:</label>
                                        <div class="col-md-10">
                                            <input required type="string" type="text" class="form-control"
                                                placeholder="Price..." name="price" value="{{ $vehicle->price }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">MaxSpeed:</label>
                                        <div class="col-md-10">
                                            <input required type="string" type="text" class="form-control"
                                                placeholder="Max speed..." name="max_speed"
                                                value="{{ $vehicle->max_speed }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Year:</label>
                                        <div class="col-md-10">
                                            <input required type="integar" class="form-control" placeholder="Year..."
                                                name="year" value="{{ $vehicle->year }}">

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Ex-color:</label>
                                        <div class="col-md-10">
                                            <Select class="form-control" name="exterior_color">

                                                @if ($vehicle->exterior_color == 'BLUE')
                                                    {<option value="blue" selected="selected">blue</option>
                                                    <option value="red">red</option>
                                                    <option value="green">green</option>
                                                    <option value="gray">gray</option>
                                                    <option value="pink">pink</option>
                                                    <option value="black">black</option>
                                                    }
                                                @elseif($vehicle->exterior_color=="RED"){

                                                    <option value="blue">blue</option>
                                                    <option value="red" selected="selected">red</option>
                                                    <option value="green">green</option>
                                                    <option value="gray">gray</option>
                                                    <option value="pink">pink</option>
                                                    <option value="black">black</option>
                                                    }
                                                @elseif($vehicle->exterior_color=="GREEN"){
                                                    <option value="blue">blue</option>
                                                    <option value="red">red</option>
                                                    <option value="green" selected="selected">green</option>
                                                    <option value="gray">gray</option>
                                                    <option value="pink">pink</option>
                                                    <option value="black">black</option>
                                                    }
                                                @elseif($vehicle->exterior_color=="GRAY"){
                                                    <option value="blue">blue</option>
                                                    <option value="red">red</option>
                                                    <option value="green">green</option>
                                                    <option value="gray" selected="selected">gray</option>
                                                    <option value="pink">pink</option>
                                                    <option value="black">black</option>
                                                    }
                                                @elseif($vehicle->exterior_color=="PINK"){
                                                    <option value="blue">blue</option>
                                                    <option value="red">red</option>
                                                    <option value="green">green</option>
                                                    <option value="gray">gray</option>
                                                    <option value="pink" selected="selected">pink</option>
                                                    <option value="black">black</option>
                                                    }
                                                @elseif($vehicle->exterior_color=="BLACK"){
                                                    <option value="blue">blue</option>
                                                    <option value="red">red</option>
                                                    <option value="green">green</option>
                                                    <option value="gray">gray</option>
                                                    <option value="pink">pink</option>
                                                    <option value="black" selected="selected">black</option>
                                                    }
                                                @endif

                                            </Select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">In-color:</label>
                                        <div class="col-md-10">
                                            <Select class="form-control" name="interior_color">
                                                @if ($vehicle->interior_color == 'BLUE')
                                                    {<option value="blue" selected="selected">blue</option>
                                                    <option value="red">red</option>
                                                    <option value="green">green</option>
                                                    <option value="gray">gray</option>
                                                    <option value="pink">pink</option>
                                                    <option value="black">black</option>
                                                    }
                                                @elseif($vehicle->interior_color=="RED"){

                                                    <option value="blue">blue</option>
                                                    <option value="red" selected="selected">red</option>
                                                    <option value="green">green</option>
                                                    <option value="gray">gray</option>
                                                    <option value="pink">pink</option>
                                                    <option value="black">black</option>
                                                    }
                                                @elseif($vehicle->interior_color=="GREEN"){
                                                    <option value="blue">blue</option>
                                                    <option value="red">red</option>
                                                    <option value="green" selected="selected">green</option>
                                                    <option value="gray">gray</option>
                                                    <option value="pink">pink</option>
                                                    <option value="black">black</option>
                                                    }
                                                @elseif($vehicle->interior_color=="GRAY"){
                                                    <option value="blue">blue</option>
                                                    <option value="red">red</option>
                                                    <option value="green">green</option>
                                                    <option value="gray" selected="selected">gray</option>
                                                    <option value="pink">pink</option>
                                                    <option value="black">black</option>
                                                    }
                                                @elseif($vehicle->interior_color=="PINK"){
                                                    <option value="blue">blue</option>
                                                    <option value="red">red</option>
                                                    <option value="green">green</option>
                                                    <option value="gray">gray</option>
                                                    <option value="pink" selected="selected">pink</option>
                                                    <option value="black">black</option>
                                                    }
                                                @elseif($vehicle->interior_color=="BLACK"){
                                                    <option value="blue">blue</option>
                                                    <option value="red">red</option>
                                                    <option value="green">green</option>
                                                    <option value="gray">gray</option>
                                                    <option value="pink">pink</option>
                                                    <option value="black" selected="selected">black</option>
                                                    }
                                                @endif
                                            </Select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label"
                                            style=" padding-left: -50px;">Transmission:</label>
                                        <div class="col-md-10">
                                            <Select class="form-control" name="transmission">
                                                @if ($vehicle->transmission == 'MANUAL')
                                                    {
                                                    <option value="MANUAL" selected="selected">MANUAL</option>
                                                    <option value="AUTOMATIC">AUTOMATIC</option>
                                                    <option value="TIPTRONIC">TIPTRONIC</option>
                                                    }
                                                @elseif($vehicle->transmission=="AUTOMATIC")
                                                    {
                                                    <option value="MANUAL">MANUAL</option>
                                                    <option value="AUTOMATIC" selected="selected">AUTOMATIC</option>
                                                    <option value="TIPTRONIC">TIPTRONIC</option>
                                                    }
                                                @elseif($vehicle->transmission=="TIPTRONIC")
                                                    {
                                                    <option value="MANUAL">MANUAL</option>
                                                    <option value="AUTOMATIC">AUTOMATIC</option>
                                                    <option value="TIPTRONIC" selected="selected">TIPTRONIC</option>
                                                    }
                                                @endif
                                            </Select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-2 control-label">status:</label>
                                        <div class="col-md-10">
                                            <Select class="form-control" name="status">
                                                @if ($vehicle->status == 'USED')
                                                    { <option value="new">new</option>
                                                    <option value="used" selected="selected">used</option>
                                                    }
                                                @else
                                                    {
                                                    <option value="new" selected="selected">new</option>
                                                    <option value="used">used</option>
                                                    }
                                                @endif
                                            </Select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-2 control-label">hasOffer: </label>
                                        <div class="col-md-10">
                                            <Select class="form-control" name="has_offer">

                                                @if ($vehicle->has_offer == 0)
                                                    { <option value="0" selected="selected">false</option>
                                                    <option value="1">true</option>
                                                    }
                                                @else
                                                    { <option value="0">false</option>
                                                    <option value="1" selected="selected">true</option>
                                                    }
                                                @endif




                                            </Select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">serviceType: </label>
                                        <div class="col-md-10">
                                            <Select class="form-control" name="service_type">

                                                @if ($vehicle->service_type == 'rent')
                                                    { <option value="buy">buy</option>
                                                    <option value="rent" selected="selected">rent</option>

                                                    }
                                                @else
                                                    {
                                                    <option value="buy" selected="selected">buy</option>
                                                    <option value="rent">rent</option>

                                                    }
                                                @endif



                                            </Select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Bodies: </label>
                                        <div class="col-md-10">
                                            <Select class="form-control" name="body">
                                                @if ($vehicle->body == 'TWO_DOOR'){
                                                    <option value="TWO_DOOR" selected="selected">TWO_DOOR</option>
                                                    <option value="FOUR_DOOR">FOUR_DOOR</option>
                                                    <option value="SEDAN">SEDAN</option>
                                                    <option value="SUV">SUV</option>
                                                    <option value="SPORT">SPORT</option>
                                                    <option value="HATCHBACK">HATCHBACK</option>
                                                    <option value="OTHER">OTHER</option>
                                                    }
                                                @elseif($vehicle->body=="TWO_DOOR"){
                                                    <option value="TWO_DOOR">TWO_DOOR</option>
                                                    <option value="FOUR_DOOR" selected="selected">FOUR_DOOR</option>
                                                    <option value="SEDAN">SEDAN</option>
                                                    <option value="SUV">SUV</option>
                                                    <option value="SPORT">SPORT</option>
                                                    <option value="HATCHBACK">HATCHBACK</option>
                                                    <option value="OTHER">OTHER</option>
                                                    }
                                                @elseif($vehicle->body=="TWO_DOOR"){
                                                    <option value="TWO_DOOR">TWO_DOOR</option>
                                                    <option value="FOUR_DOOR">FOUR_DOOR</option>
                                                    <option value="SEDAN" selected="selected">SEDAN</option>
                                                    <option value="SUV">SUV</option>
                                                    <option value="SPORT">SPORT</option>
                                                    <option value="HATCHBACK">HATCHBACK</option>
                                                    <option value="OTHER">OTHER</option>
                                                    }
                                                @elseif($vehicle->body=="TWO_DOOR"){
                                                    <option value="TWO_DOOR">TWO_DOOR</option>
                                                    <option value="FOUR_DOOR">FOUR_DOOR</option>
                                                    <option value="SEDAN">SEDAN</option>
                                                    <option value="SUV" selected="selected">SUV</option>
                                                    <option value="SPORT">SPORT</option>
                                                    <option value="HATCHBACK">HATCHBACK</option>
                                                    <option value="OTHER">OTHER</option>
                                                    }
                                                @elseif($vehicle->body=="TWO_DOOR"){
                                                    <option value="TWO_DOOR">TWO_DOOR</option>
                                                    <option value="FOUR_DOOR">FOUR_DOOR</option>
                                                    <option value="SEDAN">SEDAN</option>
                                                    <option value="SUV">SUV</option>
                                                    <option value="SPORT" selected="selected">SPORT</option>
                                                    <option value="HATCHBACK">HATCHBACK</option>
                                                    <option value="OTHER">OTHER</option>
                                                    }
                                                @elseif($vehicle->body=="HATCHBACK"){
                                                    <option value="TWO_DOOR">TWO_DOOR</option>
                                                    <option value="FOUR_DOOR">FOUR_DOOR</option>
                                                    <option value="SEDAN">SEDAN</option>
                                                    <option value="SUV">SUV</option>
                                                    <option value="SPORT">SPORT</option>
                                                    <option value="HATCHBACK" selected="selected">HATCHBACK</option>
                                                    <option value="OTHER">OTHER</option>
                                                    }
                                                @elseif($vehicle->body=="OTHER"){
                                                    <option value="TWO_DOOR">TWO_DOOR</option>
                                                    <option value="FOUR_DOOR">FOUR_DOOR</option>
                                                    <option value="SEDAN">SEDAN</option>
                                                    <option value="SUV">SUV</option>
                                                    <option value="SPORT">SPORT</option>
                                                    <option value="HATCHBACK">HATCHBACK</option>
                                                    <option value="OTHER" selected="selected">OTHER</option>
                                                    }
                                                @endif
                                            </Select>
                                        </div>
                                    </div>
                                </div><!-- end col -->

                            </div><!-- end row -->
                            <button type="submit"
                                class="btn btn-primary waves-effect w-md waves-light m-b-5  ">Submit</button>
                        </form>
                    </div>
                </div><!-- end col -->
            </div>
            <!-- end row -->


        </div>
    </div>
    </div>
@endsection
