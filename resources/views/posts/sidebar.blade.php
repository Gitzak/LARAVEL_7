<div class="row mb-5">
    <div class="col-12">
        {{-- component card_most_posts_commented --}}
        <x-card_most_posts_commented
        title="Most Posts Commented"
        :items="collect($mostCommented)">
        </x-card_most_posts_commented>
    </div>
</div>
<div class="row mb-5">
    <div class="col-12">
        {{-- component card --}}
        <x-card
        title="Most Users Active"
        :items="collect($mostUserActive)"></x-card>
    </div>
</div>
<div class="row mb-5">
    <div class="col-12">
        {{-- component card --}}
        <x-card
        title="Most Users Active in the lsat Month"
        :items="collect($mostUserActiveInLastMonth)"></x-card>
    </div>
</div>