<?php

    namespace App\Http\Requests;

    use Illuminate\Foundation\Http\FormRequest;

    class ValidatePost extends FormRequest {

        /**
         * Determine if the user is authorized to make this request.
         *
         * @return bool
         */
        public function authorize()
        {
            return true;
        }

        /**
         * Get the validation rules that apply to the request.
         *
         * @return array
         */
        public function rules()
        {
            return [
                'title' => 'required|unique:posts,title,' . $this->post . '|max:100',
                'content' => 'required|max:300',
                'category_id' => 'required',
            ];
        }
    }
