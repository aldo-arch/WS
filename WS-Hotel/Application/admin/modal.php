<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Fshirja e userit </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Jeni i sigurt qe doni te fshini userin?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Anullo</button>
                <button type="button" class="btn btn-danger" onclick=showDeleteModal('<?php echo $row['user_id']; ?>') name="delete" href="user_delete.php">Fshi</button>
            </div>
        </div>
    </div>
</div>


