<div class="modal fade" id="searchModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cari Member</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <input type="text" id="searchInput"  class="form-control" placeholder="Masukkan nama member">
                </div>
                <ul id="memberList" class="list-group">
                  
                </ul>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<!-- Tambahkan tombol "Simpan" di luar modal -->


<button type="button" data-toggle="modal" data-target="#searchModal"   class="btn btn-sm btn-primary float-right"><i class="fa fa-user-plus"></i> 
   &nbsp; Share
</button>
<script>
    const members = @json($members);
    const idBard = @json($idBoard);

// Fungsi untuk mencari anggota berdasarkan nama
function searchMembers(query) {
    query = query.toLowerCase();
    const filteredMembers = members.filter(member => member.name.toLowerCase().includes(query));
    return filteredMembers;
}

// Fungsi untuk menampilkan hasil pencarian dalam modal
function displaySearchResults(results) {
    const memberList = $('#memberList');
        memberList.empty();

        if (results.length === 0) {
            memberList.append('<p>Tidak ada hasil yang ditemukan.</p>');
        } else {
            results.forEach(member => {
                const listItem = $('<li class="list-group-item"></li>');
                listItem.text(member.name);

                // Tambahkan tombol "Tandai" pada setiap anggota
                const markButton = $('<button class="btn btn-primary btn-sm float-right">Simpan</button>');
                markButton.click(function () {
                   console.log(member);
                   console.log(idBard);
                   Livewire.emit('saveShareMember', idBard,member.id);
                
                });

                listItem.append(markButton);
                memberList.append(listItem);
            });
        }

}

// Event listener untuk input pencarian
$('#searchInput').on('input', function () {
    const query = $(this).val().trim(); // Hapus spasi di awal dan akhir
    const memberList = $('#memberList');

    if (query.length >= 3) { // Hanya jalankan pencarian jika lebih dari 2 karakter
        const searchResults = searchMembers(query);
        displaySearchResults(searchResults);
    } else {
        // Kosongkan daftar jika input kurang dari 3 karakter
        memberList.empty();
    }
});
$('#saveButton').click(function () {
        // Lakukan sesuatu dengan selectedMembers (misalnya, simpan ke database)
        console.log('Anggota yang ditandai:', selectedMembers);
    });

    // Event listener untuk tombol "Hapus yang ditandai"
    $('#deleteButton').click(function () {
        selectedMembers.length = 0; // Kosongkan daftar anggota yang ditandai
        updateSelectedMembersList();
    });
    Livewire.on('addMember', ($response) => {
                if($response == "success"){
                    Swal.fire({
                        icon: 'success',
                        title: 'account successfully connected',
                        timer: 5000
                    })
                }else {
                    Swal.fire(
                        'Erorr!',
                        'Something went wrong!',
                        'error'
                    )
                }
            });
</script>