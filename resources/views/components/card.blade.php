<div class="card text-left">
    <div class="card-body">
        <h4 class="card-title">{{ $title }}</h4>
        <ul class="list-group list-group-flush">
        @foreach ($items as $item)
            <li class="list-group-item">
                <h6>
                {{ $item->name }}
                <p class="badge badge-success float-right">Posts {{ $item->posts_count }}</p>
            </h6>
            </li>
        @endforeach
        </ul>
    </div>
</div>






{{-- <div class="card-body">
    <h4 class="card-title">Most User Active in the lsat Month</h4>
    <ul class="list-group list-group-flush">
    @foreach ($mostUserActiveInLastMonth as $userActiveInLastMonth)
        <li class="list-group-item">
            <h6>
              {{ $userActiveInLastMonth->name }}
              <p class="badge badge-success float-right">Posts {{ $userActiveInLastMonth->posts_count }}</p>
          </h6>
        </li>
    @endforeach
    </ul>
</div> --}}