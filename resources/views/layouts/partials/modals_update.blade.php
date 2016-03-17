<!-- Modal steps-->
@foreach($articles as $article)
    <div class="modal fade" id="update_step{{$article->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Steps</h4>
                </div>
                <form action="{{URL::route('pasteos.update',$article->id)}}" method="post">
                    {!! method_field('patch') !!}
                    {{csrf_field()}}
                    <div class="modal-body">
                        <input type="hidden" value="{{$headline->id}}" name="headlines_id">

                    <textarea name="step_description" class="form-control" rows="5">
{{$article->step_description}}
                    </textarea>
                        Code
                    <textarea name="code" class="form-control" rows="10">
{{$article->code}}
                    </textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endforeach
