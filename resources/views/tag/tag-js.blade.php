<script>
    $(document).ready(function() {
        loadTags();
    });

    //Create Tag
    $('#tagForm').on('submit', function(e) {
        e.preventDefault();

        const tagTitle = $('#tagTitle').val();

        $.ajax({
            url: '/api/v1/new_tag',
            method: 'POST',
            headers: {
                'Authorization': 'Bearer ' +
                    '4ade0b52c9b567754a2efbf3d0f69d28950e2c66811340a62c6b7ac5ca129141'
            },
            data: {
                title: tagTitle
            },
            success: function(response) {
                $('#createTagModal').modal('hide');
                $('#tagForm')[0].reset();
                loadTags();
            },
            error: function(xhr) {
                alert('Error: ' + xhr.responseJSON.message);
            }
        });
    });


    $(document).on('click', '.edit-tag', function() {
        const tagId = $(this).data('id');
        const tagTitle = $(this).data('title');

        $('#editTagTitle').val(tagTitle);
        $('#editTagId').val(tagId);

        $('#editTagModal').modal('show');
    });

    $('#editTagForm').on('submit', function(e) {
        e.preventDefault();

        const tagId = $('#editTagId').val();
        const updatedTag = {
            title: $('#editTagTitle').val(),
        };

        $.ajax({
            url: '/api/v1/tag/' + tagId,
            method: 'PATCH',
            headers: {
                'Authorization': 'Bearer 4ade0b52c9b567754a2efbf3d0f69d28950e2c66811340a62c6b7ac5ca129141',
            },
            data: updatedTag,
            success: function(response) {
                $('#editTagModal').modal('hide');
                loadTags();
            },
            error: function(xhr) {
                alert('Error: ' + xhr.responseJSON?.message || xhr.statusText);
            }
        });
    });

    // Tag List
    function loadTags() {
        $.ajax({
            url: '/api/v1/tags',
            method: 'GET',
            headers: {
                'Authorization': 'Bearer 4ade0b52c9b567754a2efbf3d0f69d28950e2c66811340a62c6b7ac5ca129141'
            },
            success: function(response) {
                const tags = response.data;
                $('#tagList').empty();

                tags.forEach(function(tag) {
                    $('#tagList').append(`
                    <div class="d-inline-block m-1">
                        <span class="badge bg-info p-16" style="font-size:30px">
                            ${tag.title}
                            <button class="btn btn-sm btn-light edit-tag ms-2" data-id="${tag.id}" data-title="${tag.title}">✏️</button>
                            <button class="btn btn-sm btn-danger delete-tag ms-1" data-id="${tag.id}">🗑️</button>
                        </span>
                    </div>
                `);
                });
            },
            error: function(xhr) {
                alert('Ошибка при загрузке тегов: ' + xhr.responseJSON?.message || xhr.statusText);
            }
        });
    }

    $(document).on('click', '.delete-tag', function() {
        const tagId = $(this).data('id');

        if (confirm('Delete this tag?')) {
            $.ajax({
                url: '/api/v1/tag/' + tagId,
                method: 'DELETE',
                headers: {
                    'Authorization': 'Bearer 4ade0b52c9b567754a2efbf3d0f69d28950e2c66811340a62c6b7ac5ca129141'
                },
                success: function() {
                    loadTags();
                },
                error: function(xhr) {
                    alert('Error: ' + xhr.responseJSON?.message || xhr.statusText);
                }
            });
        }
    });
</script>
