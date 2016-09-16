<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class DataEquipment extends Model
{
    protected $table = "dataEquipments";

    protected $fillable = [
        'TypeEquipment',
        'TypeAssemblyEquipment',
        'BrandEquipment',
        'ModelEquipment',
        'ColorEquipment',
        'InventoryNumberEquipment',
        'SerialNumberEquipment',
        'OSEquipment',
        'NomenclatureEquipment',
        'IPAddressEquipment',
        'BrandMotherB',
        'ModelMotherB',
        'SerialNumberMotherB',
        'BrandCPU',
        'ModelCPU',
        'FrequencyCPU',
        'BrandRam',
        'TypeRam',
        'CapabilityRam',
        'TypeHHD',
        'BrandHHD',
        'ModelHHD',
        'CapabilityHHD',
        'SerialNumberHHD',
        'BrandDiscReader',
        'TypeDiscReader',
        'supplier_id',
    ];

    public function Supplier()
    {
        return $this->belongsTo(Supplier::class);
    }
}
