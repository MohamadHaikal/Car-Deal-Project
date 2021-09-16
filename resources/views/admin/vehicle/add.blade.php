@extends("layouts.dashboard")
@section('content')
    <!-- Start content -->
    <div class="content">
        <div class="container">

            <div class="row">
                <h3 class="text-center">Add Vehicle </h3>
                <div class="col-sm-12">
                    <div class="card-box">
                        
                        <form class="form-horizontal" role="form" enctype="multipart/form-data" method="post"
                            action="{{ route('store-vehicle') }}">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6">

                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Brand:</label>
                                        <div class="col-md-10">
                                            <Select class="form-control" name="brand_id">
                                                @foreach ($brand as $b)
                                                    <option value="{{ $b->id }}">{{ $b->name }}</option>
                                                @endforeach

                                            </Select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-2 control-label" style=" padding-right: 10px;"> Engine_Force:
                                        </label>
                                        <div class="col-md-10">
                                            <input required type="string" type="text" name="engine_force"
                                                class="form-control" placeholder="Engine Force...">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Fule:</label>
                                        <div class="col-md-10">
                                            <Select class="form-control" name="fuel">

                                                <option value="BENZIN">BENZIN</option>
                                                <option value="DISEL">DISEL</option>
                                                <option value="ELICTRIC">ELICTRIC</option>
                                                <option value="OTHER">OTHER</option>

                                            </Select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Kilometrage:</label>
                                        <div class="col-md-10">
                                            <input required type="string" type="text" class="form-control"
                                                placeholder="Kilometrage..." name="kilometrage">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Descripton:</label>
                                        <div class="col-md-10">
                                            <textarea required type="string" class="form-control" rows="3"
                                                placeholder="Descripton..." name="description"></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-2 control-label">country:</label>
                                        <div class="col-md-10">
                                            <input required type="string" type="text" class="form-control"
                                                placeholder="origin-country..." name="origin_country">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">isAvailable:</label>
                                        <div class="col-md-10">
                                            <Select class="form-control" name="is_available">

                                                <option value="1">true</option>
                                                <option value="0">false</option>

                                            </Select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">specialOffer:</label>
                                        <div class="col-md-10">
                                            <Select class="form-control" name="special_offer_id">
                                                @foreach ($offers as $offer)
                                                    <option value="{{ $offer->id }}">{{ $offer->ratio }}%</option>
                                                @endforeach


                                            </Select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-2 control-label">images:</label>
                                        <div class="col-md-10">
                                            <input type="file" name="images[]" placeholder="address" multiple
                                                class="dropify" data-height="300">
                                        </div>
                                    </div>


                                </div>
                                <!-- end col -->

                                <div class="col-lg-6">

                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Price:</label>
                                        <div class="col-md-10">
                                            <input required type="string" type="text" class="form-control"
                                                placeholder="Price..." name="price">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">MaxSpeed:</label>
                                        <div class="col-md-10">
                                            <input required type="string" type="text" class="form-control"
                                                placeholder="Max speed..." name="max_speed">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Year:</label>
                                        <div class="col-md-10">
                                            <input required type="integar" class="form-control" placeholder="Year..."
                                                name="year">

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Ex-color:</label>
                                        <div class="col-md-10">
                                            <Select class="form-control" name="exterior_color">

                                                <option value="blue">blue</option>
                                                <option value="red">red</option>
                                                <option value="green">green</option>
                                                <option value="gray">gray</option>
                                                <option value="pink">pink</option>
                                                <option value="black">black</option>

                                            </Select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">In-color:</label>
                                        <div class="col-md-10">
                                            <Select class="form-control" name="interior_color">

                                                <option value="blue">blue</option>
                                                <option value="red">red</option>
                                                <option value="green">green</option>
                                                <option value="gray">gray</option>
                                                <option value="pink">pink</option>
                                                <option value="black">black</option>

                                            </Select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label"
                                            style=" padding-left: -50px;">Transmission:</label>
                                        <div class="col-md-10">
                                            <Select class="form-control" name="transmission">

                                                <option value="MANUAL">MANUAL</option>
                                                <option value="AUTOMATIC">AUTOMATIC</option>
                                                <option value="TIPTRONIC">TIPTRONIC</option>


                                            </Select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-2 control-label">status:</label>
                                        <div class="col-md-10">
                                            <Select class="form-control" name="status">
                                                <option value="new">new</option>
                                                <option value="used">used</option>



                                            </Select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-2 control-label">hasOffer: </label>
                                        <div class="col-md-10">
                                            <Select class="form-control" name="has_offer">
                                                <option value="0">false</option>
                                                <option value="1">true</option>



                                            </Select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">serviceType: </label>
                                        <div class="col-md-10">
                                            <Select class="form-control" name="service_type">
                                                <option value="buy">buy</option>
                                                <option value="rent">rent</option>
                                            </Select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Bodies: </label>
                                        <div class="col-md-10">
                                            <Select class="form-control" name="body">
                                                <option value="TWO_DOOR">TWO_DOOR</option>
                                                <option value="FOUR_DOOR">FOUR_DOOR</option>
                                                <option value="SEDAN">SEDAN</option>
                                                <option value="SUV">SUV</option>
                                                <option value="SPORT">SPORT</option>
                                                <option value="HATCHBACK">HATCHBACK</option>
                                                <option value="OTHER">OTHER</option>
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
