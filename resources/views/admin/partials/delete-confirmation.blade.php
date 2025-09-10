@extends('layouts.app')

@section('js')
<script>
        document.addEventListener('DOMContentLoaded', function() {
            const deleteForms = document.querySelectorAll('.delete-form');
            deleteForms.forEach(function(form) {
                form.addEventListener('submit', function(event) {
                    event.preventDefault(); // Prevent the form from submitting immediately

                    Swal.fire({
                        title: 'Are you sure?',
                        text: "You won't be able to revert this!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit(); // Submit the form if confirmed
                        }
                    });
                });
            });
        });
    </script>

@endsection
