@extends('layouts.app')
@section('title', 'Home')
@section('content')
    
<center><p class="display-5">Convert Files to PDF at one place!</p></center>
    <div class="row offset-md-4">
        <div class="col-md-12">
            <form action="{{ route('upload') }}" class="col-md-6" method="post" enctype='multipart/form-data'>
                {{ csrf_field() }}<br>
                <span class="text-danger">
                    @if (!empty($errormsg))
                        {{ $errormsg }}
                    @endif
                </span>
                {{-- <div class="mb-3">
                    <label for="fileName" class="form-label">File Name</label>
                    <input type="text" class="form-control" id="fileName" placeholder="Enter File Title" name="fileName"
                        value="{{ old('fileName') }}" class="form-control">
                    @error('fileName')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div> --}}
                <div class="mb-3">
                    <label for="formFile" class="form-label">Select A File (.xlsx, .doc, docx, jpg, jpeg, png, gif Only)</label>
                    <input class="form-control" type="file" id="formFile" name="officeFile">
                    @error('officeFile')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <input type="submit" name="submitPreview" class="btn btn-secondary" value="Convert & Preview"> 
                <input type="submit" name="submitDownload" class="btn btn-secondary" value="Convert & Download">
                {{-- <input type="submit" name="submitPreviewBrowser" class="btn btn-secondary" value="Preview"> --}}
            </form>
        </div>
    </div>
@endsection
