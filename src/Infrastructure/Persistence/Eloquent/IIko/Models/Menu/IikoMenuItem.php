<?php

declare(strict_types=1);

namespace Infrastructure\Persistence\Eloquent\IIko\Models\Menu;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $id
 * @property int $iiko_menu_item_group_id
 * @property string $external_id
 * @property string $sku
 * @property string $name
 * @property string|null $description
 * @property string|null $type
 * @property string|null $measure_unit
 * @property string|null $payment_subject
 * @property bool $is_hidden
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Infrastructure\Persistence\Eloquent\IIko\Models\Menu\IikoMenuItemGroup $itemGroup
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Infrastructure\Persistence\Eloquent\IIko\Models\Menu\IikoMenuItemSize> $itemSizes
 * @property-read int|null $item_sizes_count
 *
 * @method static \Illuminate\Database\Eloquent\Builder|IikoMenuItem newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|IikoMenuItem newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|IikoMenuItem query()
 * @method static \Illuminate\Database\Eloquent\Builder|IikoMenuItem whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IikoMenuItem whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IikoMenuItem whereExternalId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IikoMenuItem whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IikoMenuItem whereIikoMenuItemGroupId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IikoMenuItem whereIsHidden($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IikoMenuItem whereMeasureUnit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IikoMenuItem whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IikoMenuItem wherePaymentSubject($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IikoMenuItem whereSku($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IikoMenuItem whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IikoMenuItem whereUpdatedAt($value)
 *
 * @mixin \Eloquent
 */
final class IikoMenuItem extends Model
{
    protected $fillable = [
        'iiko_menu_item_group_id',
        'external_id',
        'sku',
        'name',
        'description',
        'type',
        'measure_unit',
        'payment_subject',
        'is_hidden',
    ];

    public function itemGroup(): BelongsTo
    {
        return $this->belongsTo(IikoMenuItemGroup::class, 'iiko_menu_item_group_id', 'id');
    }

    /**
     * @return HasMany<array-key, IikoMenuItemSize>
     */
    public function itemSizes(): HasMany
    {
        return $this->hasMany(IikoMenuItemSize::class, 'iiko_menu_item_id', 'id');
    }

    public function casts(): array
    {
        return [
            'is_hidden' => 'boolean',
        ];
    }
}