<!-- Modal Update Headline-->
<div class="modal fade" id="update-headline" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                {{--<h4 class="modal-title" id="myModalLabel">Headline</h4>--}}
            </div>
            <form action="{{URL::to('/paste/update-headline/'.$headline->id)}}">
                {{csrf_field()}}
                <div class="modal-body">
                    <h4>Headline</h4>
                    <input type="text" name="headline" class="form-control" value="{{$headline->headline}}">
                    <h4>Description</h4>
                    <textarea name="description" class="form-control" rows="15">{{$headline->description}}</textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>

                </div>
            </form>
        </div>
    </div>
</div>
