<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <h1 class="text-center mt-3">Create your post<h1>
        </div>
        <div class="col-8 m-auto">
            <form method="POST">
                <div class="form-group">
                    <label for="exampleInputEmail1">Title</label>
                    <input type="email" id="email" class="form-control" aria-describedby="emailHelp" name="email" placeholder="Title of your post...">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Description</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" placeholder="Description of your post..." rows="3"></textarea>
                </div>

                <div class="form-group">
                    <label for="exampleFormControlSelect1">Select category:</label>
                    <select class="form-control" id="exampleFormControlSelect1">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                    </select>
                </div>

                <button type="button" id="submit" class="btn btn-primary">Submit</button>
            </form>

            <div class="message mt-3">
                
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="assets/js/post.js"></script>