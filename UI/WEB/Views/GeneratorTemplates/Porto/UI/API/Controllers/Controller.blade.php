<?= "<?php\n" ?>

namespace App\Containers\{{ $gen->containerName() }}\UI\API\Controllers;

use App\Containers\{{ $gen->containerName() }}\Actions\{{ $gen->entityName() }}\{{ $gen->actionClass('ListAndSearch', $plural = true) }};
use App\Containers\{{ $gen->containerName() }}\Actions\{{ $gen->entityName() }}\{{ $gen->actionClass('Create') }};
use App\Containers\{{ $gen->containerName() }}\Actions\{{ $gen->entityName() }}\{{ $gen->actionClass('Get') }};
use App\Containers\{{ $gen->containerName() }}\Actions\{{ $gen->entityName() }}\{{ $gen->actionClass('Update') }};
use App\Containers\{{ $gen->containerName() }}\Actions\{{ $gen->entityName() }}\{{ $gen->actionClass('Delete') }};
use App\Containers\{{ $gen->containerName() }}\Actions\{{ $gen->entityName() }}\{{ $gen->actionClass('Restore') }};
use App\Containers\{{ $gen->containerName() }}\Actions\{{ $gen->entityName() }}\{{ $gen->actionClass('FormData', false, true) }};
use App\Containers\{{ $gen->containerName() }}\UI\API\Requests\{{ $gen->entityName() }}\{{ str_replace('.php', '', $gen->apiRequestFile('Create', $plural = false)) }};
use App\Containers\{{ $gen->containerName() }}\UI\API\Requests\{{ $gen->entityName() }}\{{ str_replace('.php', '', $gen->apiRequestFile('Get', $plural = false)) }};
use App\Containers\{{ $gen->containerName() }}\UI\API\Requests\{{ $gen->entityName() }}\{{ str_replace('.php', '', $gen->apiRequestFile('Delete', $plural = false)) }};
use App\Containers\{{ $gen->containerName() }}\UI\API\Requests\{{ $gen->entityName() }}\{{ str_replace('.php', '', $gen->apiRequestFile('ListAndSearch', $plural = true)) }};
use App\Containers\{{ $gen->containerName() }}\UI\API\Requests\{{ $gen->entityName() }}\{{ str_replace('.php', '', $gen->apiRequestFile('Restore', $plural = false)) }};
use App\Containers\{{ $gen->containerName() }}\UI\API\Requests\{{ $gen->entityName() }}\{{ str_replace('.php', '', $gen->apiRequestFile('Update', $plural = false)) }};
use App\Containers\{{ $gen->containerName() }}\UI\API\Transformers\{{ $gen->entityName() }}Transformer;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\Request;

/**
 * Controller Class.
 */
class {{ $gen->entityName() }}Controller extends ApiController
{
	public function formModel(Request $request)
	{
		$model = config($request->model.'-form-model');

		if (empty($model)) {
            return abort(404, 'No Data Found.');
        }

		return $model;
	}

	public function {{ camel_case($gen->entityName()) }}FormData()
	{
		$data = $this->call({{ $gen->actionClass('FormData', false, true) }}::class);

		return $data;
	}

	public function listAndSearch{{ str_plural($gen->entityName()) }}({{ str_replace('.php', '', $gen->apiRequestFile('ListAndSearch', $plural = true)) }} $request)
	{
		${{ camel_case(str_plural($gen->entityName())) }} = $this->call({{ $gen->actionClass('ListAndSearch', $plural = true) }}::class, [$request]);
		return $this->transform(${{ camel_case(str_plural($gen->entityName())) }}, new {{ $gen->entityName() }}Transformer());
	}

	public function create{{ $gen->entityName() }}({{ str_replace('.php', '', $gen->apiRequestFile('Create', $plural = false)) }} $request)
	{
		${{ camel_case($gen->entityName()) }} = $this->call({{ $gen->actionClass('Create') }}::class, [$request->all()]);
		return $this->transform(${{ camel_case($gen->entityName()) }}, new {{ $gen->entityName() }}Transformer());
	}

	public function get{{ $gen->entityName() }}({{ str_replace('.php', '', $gen->apiRequestFile('Get', $plural = false)) }} $request)
	{
		${{ camel_case($gen->entityName()) }} = $this->call({{ $gen->actionClass('Get') }}::class, [$request->id]);
		return $this->transform(${{ camel_case($gen->entityName()) }}, new {{ $gen->entityName() }}Transformer());
	}

	public function update{{ $gen->entityName() }}({{ str_replace('.php', '', $gen->apiRequestFile('Update', $plural = false)) }} $request)
	{
		${{ camel_case($gen->entityName()) }} = $this->call({{ $gen->actionClass('Update') }}::class, [$request->id, $request->all()]);
		return $this->transform(${{ camel_case($gen->entityName()) }}, new {{ $gen->entityName() }}Transformer());
	}

	public function delete{{ $gen->entityName() }}({{ str_replace('.php', '', $gen->apiRequestFile('Delete', $plural = false)) }} $request)
	{
		${{ camel_case($gen->entityName()) }} = $this->call({{ $gen->actionClass('Delete') }}::class, [$request->id]);
		return $this->accepted('{{ $gen->entityName() }} Deleted Successfully.');
	}

@if($gen->hasSoftDeleteColumn)
	public function restore{{ $gen->entityName() }}({{ str_replace('.php', '', $gen->apiRequestFile('Restore', $plural = false)) }} $request)
	{
		${{ camel_case($gen->entityName()) }} = $this->call({{ $gen->actionClass('Restore') }}::class, [$request->id]);
		return $this->transform(${{ camel_case($gen->entityName()) }}, new {{ $gen->entityName() }}Transformer());
	}
@endif
}
