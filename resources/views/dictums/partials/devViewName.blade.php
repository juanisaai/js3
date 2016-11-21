@if((($dictum->device->InventoryNumberDevice) === null))
    N. Inv: S/N<br>Descr: {{ $dictum->device->DescriptionDevice }}
@elseif((empty($dictum->device->InventoryNumberDevice)))
    N. Inv: S/N<br>Descr: {{ $dictum->device->DescriptionDevice }}
@else
    N. Inv: {{ $dictum->device->InventoryNumberDevice }}<br>Descr: {{ $dictum->device->DescriptionDevice }}
@endif

