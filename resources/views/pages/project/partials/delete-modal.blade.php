<div id="deleteModal" class="modal__outer">
  <div class="modal">
    <div class="modal__header">
      <strong>Archive Project?</strong>
    </div>
    <div class="modal__content">
      <p>Are you sure you want to archive the project:</p>
      <h3></h3>
    </div>
    <div class="modal__footer">
      <div class="pull-right">
        {!! Form::open() !!}
        <button class="btn btn-default" data-modal-close="#deleteModal">Cancel</button>
        <input class="btn btn-primary" type="submit" value="Submit"/>
        {!! Form::close() !!}
      </div>
    </div>
    <div class="modal__close" data-modal-close="#deleteModal"><i class="fa fa-times" aria-hidden="true"></i></div>
  </div>
</div>