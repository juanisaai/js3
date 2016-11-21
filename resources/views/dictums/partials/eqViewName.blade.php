@if((($dictumEq->equipment->InventoryNumberEquipment) === null))
    N. Inv: S/N<br>Descr: {{ $dictumEq->equipment->DescriptionEquipment }}
@elseif((empty($dictumEq->equipment->InventoryNumberEquipment)))
    N. Inv: S/N<br>Descr: {{ $dictumEq->equipment->DescriptionEquipment }}
@else
    N. Inv: {{ $dictumEq->equipment->InventoryNumberEquipment }}<br>Descr: {{ $dictumEq->Equipment->DescriptionEquipment }}
@endif
