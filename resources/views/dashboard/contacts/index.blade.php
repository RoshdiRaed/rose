@extends('dashboard.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Contact Form Submissions</h4>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="thead-light">
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Message</th>
                                    <th>Submitted At</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($submissions as $submission)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $submission->name }}</td>
                                        <td><a href="mailto:{{ $submission->email }}">{{ $submission->email }}</a></td>
                                        <td><a href="tel:{{ $submission->phone }}">{{ $submission->phone }}</a></td>
                                        <td>{{ Str::limit($submission->message, 50) }}</td>
                                        <td>{{ $submission->created_at->format('M d, Y h:i A') }}</td>
                                        <td>
                                            <button class="btn btn-sm btn-info" data-toggle="modal" data-target="#messageModal{{ $submission->id }}">
                                                <i class="fas fa-eye"></i> View
                                            </button>
                                            <form action="{{ route('contact-submissions.destroy', $submission->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this submission?')">
                                                    <i class="fas fa-trash"></i> Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>

                                    <!-- Message Modal -->
                                    <div class="modal fade" id="messageModal{{ $submission->id }}" tabindex="-1" role="dialog" aria-labelledby="messageModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="messageModalLabel">Message from {{ $submission->name }}</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p><strong>Name:</strong> {{ $submission->name }}</p>
                                                    <p><strong>Email:</strong> <a href="mailto:{{ $submission->email }}">{{ $submission->email }}</a></p>
                                                    <p><strong>Phone:</strong> <a href="tel:{{ $submission->phone }}">{{ $submission->phone }}</a></p>
                                                    <p><strong>Submitted:</strong> {{ $submission->created_at->format('F j, Y \a\t g:i A') }}</p>
                                                    <hr>
                                                    <h6>Message:</h6>
                                                    <p class="text-justify">{{ nl2br(e($submission->message)) }}</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <a href="mailto:{{ $submission->email }}" class="btn btn-primary">
                                                        <i class="fas fa-reply"></i> Reply
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center">No contact form submissions found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
