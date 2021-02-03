<div class="modal fade" id="modalPost" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title align-content-center" id="exampleModalLongTitle" >Tạo bài viết</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="padding: 0">
                <form name="formPost" enctype="multipart/form-data">
                    @csrf
                    <textarea autofocus name="content" class="form-control mb-2" style="border:none; resize: none !important" placeholder="Bạn đang nghĩ gì ?" rows="7"></textarea>
                    <div id="content"></div>
                    <input name="picture" class="ml-3 mt-1 form-control-file" style="outline: none" type="file">
                    <div id="picture"></div>
                    <div class="form-group pl-3 pr-3 pt-3">
                        <button name="submit" type="submit" class="btn btn-block btn-primary">Lưu</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    $('form[name="formPost"]').submit(function (e) {
        e.preventDefault();
        let formData = new FormData($('form[name="formPost"]').get(0));
        let content = $('#content');
        let picture = $('#picture');
        $(content).html('');
        $(picture).html('');
        async function store(){
            let response = await fetch("{{ route('post.store') }}", {
                method: "POST",
                body: formData,
                processData: false,
                contentType: false,
            });
            if (!response.ok){
                if (response.status === 400){
                    response.json().then( e => {
                        if ('content' in e.errors){
                            $('#content').html(`<span class="text-danger ml-3"><strong>${ e.errors['content'][0]}</strong></span>`)
                        }
                        if ('picture' in e.errors){
                            $('#picture').html(`<span class="text-danger ml-3"><strong>${ e.errors['picture'][0]}</strong></span>`)
                        }
                    });
                }
                throw new Error("Error: " + response.status);
            }else{
                return await response.json();
            }
        }
        store().then(response =>{
            window.location.replace(response.url);
        }).catch(e => {
            console.log(e);
        });
    })
</script>
