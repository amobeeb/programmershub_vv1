<x-app-layout> 
  
 
    <div class="lime-container">
    <div class="lime-body">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="page-title">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-separator-1">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Chapters</li>
                        </ol>
                    </nav>
                    <h3>Members</h3>
                    {{-- <p class="page-desc"></p> --}}
                </div>
            </div>
        </div>
       <livewire:member />
            
    </div>
    </div>
</x-app-layout>