<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Fshirja e dhomes </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Jeni i sigurt qe doni te fshini dhomen?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Anullo</button>
                <button type="button" class="btn btn-danger" onclick=showDeleteModalRoom("<?=$row['room_id']; ?>") name="delete" href="room_delete.php">Fshi</button>
            </div>
        </div>
    </div>
</div>


