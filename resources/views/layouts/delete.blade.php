 <!-- modal -->
 <div class="modal fade" id="delete-model">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Want to Delete?</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
              Press logout to leave
            </div>
            <div class="modal-footer">
                <form action="{{ route($route, $model->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
      <!-- end of modal -->