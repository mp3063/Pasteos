
<!-- Modal Headline-->
<div class="modal fade" id="headline" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                {{--<h4 class="modal-title" id="myModalLabel">Headline</h4>--}}
            </div>
            <form action="{{URL::route('pasteos.store')}}" method="post">
                {{csrf_field()}}
                <div class="modal-body">
                    <h4>Headline</h4>
                    <input type="text" name="headline" class="form-control">
                    <h4>Description</h4>
                    <textarea name="description" class="form-control" rows="15"></textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>

                </div>
            </form>
        </div>
    </div>
</div>





<!-- Modal steps-->
<div class="modal fade" id="steps" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Steps</h4>
            </div>
            @if(isset($headline->id))
            <form action="{{URL::to('paste/'.$headline->id)}}">
                {!! method_field('patch') !!}
                {{csrf_field()}}
                <div class="modal-body">

                    <input type="hidden" value="{{$headline->id}}" name="headlines_id">

                    Step description
                    <textarea name="step_description" class="form-control" rows="5"></textarea>
                    Code
                    <textarea name="code" class="form-control" rows="10"></textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
            @endif
        </div>
    </div>
</div>