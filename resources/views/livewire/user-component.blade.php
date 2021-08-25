<div class="container">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse($users as $user)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    <button wire:click="destroy('{{ $user->id }}')" type="button"
                        class="btn btn-sm btn-danger">Delete</button>
                    <button wire:click="destroy('{{ $user->id }}')"
                        onclick="confirm('Are you sure you want to delete?') || event.stopImmediatePropagation()"
                        type="button" class="btn btn-sm btn-danger">Delete JS</button>
                    <button wire:click="destroyModal('{{ $user->id }}')" type="button"
                        class="btn btn-sm btn-danger">Delete Modal</button>
                </td>
            </tr>
            @empty
            <tr colspan="4">No user found!</tr>
            @endforelse
        </tbody>
    </table>
    @if($user_id != null)
    <div class="modal d-block" style="background: rgb(0 0 0 / 50%);" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Confirm Delete</h5>
                    <button wire:click="destroyCancel('{{ $user->id }}')" type="button" class="close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete?
                </div>
                <div class="modal-footer">
                    <button wire:click="destroyCancel()" type="button"
                        class="btn btn-sm btn-secondary">Cancel</button>
                    <button wire:click="destroyConfirm()" type="button" class="btn btn-sm btn-danger">Yes</button>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>