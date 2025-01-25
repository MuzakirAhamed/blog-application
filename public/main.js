$(document).ready(function () {
    fetchPosts();
    function fetchPosts() {
        $.ajax({
            url: `http://127.0.0.1:8000/fetchpost`, 
            type: 'GET',
            success: function (response) {
                const posts = response.posts;
                
                let rows = '';
                if (posts.length > 0) {
                    posts.forEach((post, index) => {
                        rows += `
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td scope="row" class="px-6 py-4">${index + 1}</td>
                            <td class="px-6 py-4 blogName">${post.name}</td>
                            <td class="px-6 py-4">${post.date}</td>
                            <td class="px-6 py-4">${post.author_name.name}</td>
                            <td class="px-6 py-4">${post.content}</td>
                            <td class="px-6 py-4">
                                <div class="flex space-x-1.5">
                                   <button data-id="${post.id}" class="viewButton" title="View"><svg
                                            width="20px" height="20px" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round">
                                            </g>
                                            <g id="SVGRepo_iconCarrier">
                                                <path
                                                    d="M9 4.45962C9.91153 4.16968 10.9104 4 12 4C16.1819 4 19.028 6.49956 20.7251 8.70433C21.575 9.80853 22 10.3606 22 12C22 13.6394 21.575 14.1915 20.7251 15.2957C19.028 17.5004 16.1819 20 12 20C7.81811 20 4.97196 17.5004 3.27489 15.2957C2.42496 14.1915 2 13.6394 2 12C2 10.3606 2.42496 9.80853 3.27489 8.70433C3.75612 8.07914 4.32973 7.43025 5 6.82137"
                                                    stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"></path>
                                                <path
                                                    d="M15 12C15 13.6569 13.6569 15 12 15C10.3431 15 9 13.6569 9 12C9 10.3431 10.3431 9 12 9C13.6569 9 15 10.3431 15 12Z"
                                                    stroke="#1C274C" stroke-width="1.5"></path>
                                            </g>
                                        </svg>
                                    </button>
                                    <button data-id="${post.id}" class="editButton" title="Edit">
                                        <svg
                                            width="20px" height="20px" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round">
                                            </g>
                                            <g id="SVGRepo_iconCarrier">
                                                <path
                                                    d="M21.2799 6.40005L11.7399 15.94C10.7899 16.89 7.96987 17.33 7.33987 16.7C6.70987 16.07 7.13987 13.25 8.08987 12.3L17.6399 2.75002C17.8754 2.49308 18.1605 2.28654 18.4781 2.14284C18.7956 1.99914 19.139 1.92124 19.4875 1.9139C19.8359 1.90657 20.1823 1.96991 20.5056 2.10012C20.8289 2.23033 21.1225 2.42473 21.3686 2.67153C21.6147 2.91833 21.8083 3.21243 21.9376 3.53609C22.0669 3.85976 22.1294 4.20626 22.1211 4.55471C22.1128 4.90316 22.0339 5.24635 21.8894 5.5635C21.7448 5.88065 21.5375 6.16524 21.2799 6.40005V6.40005Z"
                                                    stroke="#000000" stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round"></path>
                                                <path
                                                    d="M11 4H6C4.93913 4 3.92178 4.42142 3.17163 5.17157C2.42149 5.92172 2 6.93913 2 8V18C2 19.0609 2.42149 20.0783 3.17163 20.8284C3.92178 21.5786 4.93913 22 6 22H17C19.21 22 20 20.2 20 18V13"
                                                    stroke="#000000" stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round"></path>
                                            </g>
                                        </svg>
                                    </button>
                                    <button data-id="${post.id}" class="deleteButton" title="Delete">
                                       <svg
                                                width="20px" height="20px" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                    stroke-linejoin="round"></g>
                                                <g id="SVGRepo_iconCarrier">
                                                    <path d="M10 12V17" stroke="#000000" stroke-width="2"
                                                        stroke-linecap="round" stroke-linejoin="round"></path>
                                                    <path d="M14 12V17" stroke="#000000" stroke-width="2"
                                                        stroke-linecap="round" stroke-linejoin="round"></path>
                                                    <path d="M4 7H20" stroke="#000000" stroke-width="2"
                                                        stroke-linecap="round" stroke-linejoin="round"></path>
                                                    <path
                                                        d="M6 10V18C6 19.6569 7.34315 21 9 21H15C16.6569 21 18 19.6569 18 18V10"
                                                        stroke="#000000" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round"></path>
                                                    <path
                                                        d="M9 5C9 3.89543 9.89543 3 11 3H13C14.1046 3 15 3.89543 15 5V7H9V5Z"
                                                        stroke="#000000" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round"></path>
                                                </g>
                                            </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        `;
                    });
                } else {
                    rows = `
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td colspan="6" class="px-6 py-4 text-center">No data found</td>
                    </tr>`;
                }

                $('table tbody').html(rows);
            },
            error: function (error) {
                console.error('Error fetching posts:', error);
            },
        });
    }
    
    const quill = new Quill('#editor', {
        theme: 'snow'
    });

    const quillEdit = new Quill('#edit_editor', {
        theme: 'snow'
    });

    const quillView = new Quill('#view_editor', {
        theme: 'snow'
    });

    // Open the Create Post modal
    $('#createPostBtn').click(function () {
        $('#modal').fadeIn();
    });

    // Close the modals
    $('#closeModalBtn').click(function () {
        $(this).closest('#modal').fadeOut();
    });

    $('#cancelUpdateBtn').click(function(){
        $('#editModal').fadeOut();
    })

    // Create new post
    $('#createPostBtnConfirm').click(function () {
        const formData = new FormData();
        const name = $('input[name=name]').val();
        const content = quill.root.innerHTML;
        const image = $('#image').prop('files')[0]; 
        let isValid = true;
        
        if (name == '') {
            isValid=false
            $('#postNameError').removeClass('hidden')
        }
        if (content == '' || content == '<p><br></p>') {
            isValid=false
            $('#contentError').removeClass('hidden')
        }
        if (image == ''|| image == undefined) {
            isValid=false
            $('#imageError').removeClass('hidden')
        }
        formData.append('name', name);
        formData.append('content', content);
        formData.append('image', image);
        if (isValid) {
            $.ajax({
                type: 'POST',
                url: $('#modal').attr('save-action'),
                cache: false,
                contentType: false,
                processData: false,
                headers: {
                    'X-CSRF-TOKEN': $('#createPostForm').attr('token'),
                },
                data: formData,
                success: function (response) {
                    $('#modal').fadeOut();
                    alert(response.message); 
                    window.location.reload()
                },
                error: function (xhr) {
                    console.error('Error creating post:', xhr.responseText);
                }
            });  
        } 
    });

    // Open the Edit Post modal
    $(document).on('click','.editButton',(function () {
        const editId = $(this).data('id'); 

        $.ajax({
            type: 'GET',
            url: `http://127.0.0.1:8000/post/${editId}/edit`,
            success: function (response) {

                $('#editModal input[name="editName"]').val(response.data.name);
                quillEdit.root.innerHTML = response.data.content; 
                $('#updateBtn').attr('editId', response.data.id); 

                $('#editModal').fadeIn(); 
            },
            error: function (xhr) {
                console.error('Error fetching post data:', xhr.responseText);
                alert('Failed to fetch the post details.');
            }
        });
    }));

    $(document).on('click','.viewButton',(function () {
        const viewId = $(this).data('id'); 

        $.ajax({
            type: 'GET',
            url: `http://127.0.0.1:8000/post/${viewId}`,
            success: function (response) {

                $('#viewModal input[name="viewName"]').val(response.data.name);
                $('#viewModal img[name="viewImage"]').attr('src', `/storage/${response.data.blog_image}`);

                quillView.root.innerHTML = response.data.content; 
                $('#updateBtn').attr('editId', response.data.id); 

                $('#viewModal').fadeIn(); 
            },
            error: function (xhr) {
                console.error('Error fetching post data:', xhr.responseText);
                alert('Failed to fetch the post details.');
            }
        });
    }));

    $('#closeViewModalBtn').click(function(){
        $('#viewModal').fadeOut(); 
    })

    $(document).on('click', '#updateBtn', function () {
        const updateId = $(this).attr('editId'); 

        if (!updateId) {
            console.error('No editId found for updateBtn.');
            return;
        }

        const name = $('input[name=editName]').val();
        const content = quillEdit.root.innerHTML; 
        const image = $('#editImage').prop('files')[0]; 

        const formData = new FormData();
        formData.append('name', name);
        formData.append('content', content);
        formData.append('editId', updateId);
        if (image) {
            formData.append('image', image); 
        }
        formData.append('_method', 'PUT'); 

        $.ajax({
            type: 'POST',
            url: `http://127.0.0.1:8000/post/${updateId}`,
            cache: false,
            contentType: false,
            processData: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'), 
            },
            data: formData,
            success: function (response) {
                alert(response.message); 
                location.reload(); 
            },
            error: function (xhr) {
                console.error('Error updating post:', xhr.responseText);
                alert('An error occurred while updating the post.');
            }
        });
    });

    $(document).on('click','.deleteButton',(function () {
        const deleteId = $(this).data('id'); 
        const isConfirmed = confirm('Are you sure you want to delete this item?');
        if (isConfirmed) {
            $.ajax({
                url: `http://127.0.0.1:8000/post/${deleteId}`, 
                type: 'DELETE', 
                cache: false,
                contentType: false,
                processData: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'), 
                },         
                data: JSON.stringify({ id: deleteId }),
                success: function(response) {
                    alert(response.message)
                    window.location.reload();
                },
                error: function(error) {
                    alert('Failed to delete the item');
                }
            });
        } else {
            console.log('Deletion canceled');
        }
    }));

   $('#searchBtn').click(function () {
     const query= $('#seachInput').val()
    if (query) {
        let blogName;
        blogName = $('.blogName').text();
        $('.blogName').each(function () {
            const blogName = $(this).text().toLowerCase().trim(); 
            if (blogName.includes(query)) {
                $(this).closest('tr').show();
            } else {
                $(this).closest('tr').hide(); 
            }
        });
    } else{
        $('table tbody tr').show();
    }     
   })
});


