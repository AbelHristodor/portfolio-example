<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addPost">
  Add New
</button>

<div class="modal fade" id="addPost" tabindex="-1" role="dialog" aria-labelledby="addPostLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addPostLabel">Add new Blog Post</h5>
      </div>
      <div class="modal-body">
        <div id="modal-error" class="alert alert-danger alert-dismissible"  role="alert">
            <i class="fa fa-exclamation-circle fa-fw" aria-hidden="true"></i>
            C'è stato un errore, riprova più tardi. Se l'errore persiste contatta l'amministratore.
        </div>
        <form method="POST" id="add_new_form">
            <div class="form-group">
                <label for="title_input">Title</label>
                <input type="text" class="form-control" id="title_input" name="title_input" placeholder="Enter Blog Post title">
            </div>
            <div class="form-group">
                <label for="summary_input">Summary</label>
                <textarea type="text" class="form-control" id="summary_input" name="summary_input" placeholder="Enter Blog Post summary" maxlength="254"></textarea>
            </div>
            <div class="form-group">
                <label for="description_input">Description</label>
                <textarea type="text" class="form-control" id="description_input" name="description_input" placeholder="Enter your Blog Post Description" maxlength="254"></textarea>
            </div>
            <div class="form-group">
                <label for="image_input">Select Blog Post Image</label>
                <input type="file" class="form-control-file" id="image_input" accept="image/*">
            </div>
            <button type="submit" class="btn btn-primary" id="submit_button">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>