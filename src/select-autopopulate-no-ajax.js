/* =============================================================
 * select-autopopulate-no-ajax.js v1.0.0
 * =============================================================
 * Author 2020 Marc TONYE <tinyskillz69@gmail.com>
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 * ============================================================ */

(function( $ ) {
    $.fn.autopopulatedselect = function ( childSelect, childValueEmpty = true ) {
        
        return this.each( function() {
            currentElement = $(this);
            parentSelectId = currentElement.attr( 'id' );
            parentToChildArray = [];
            // Get parent select options
            $( '#' + parentSelectId + ' option' ).each(function() {
                parentToChildArray[  $(this).val() ] = [];
            });
            // Get the child select options
            $( childSelect + ' option' ).each(function() {
                if( parentToChildArray[ $(this).attr( 'parent-option' ) ] != undefined ){
                    parentToChildArray[ $(this).attr( 'parent-option' ) ].push( $(this) );
                }
                $(this).remove();
            });
            // Reverse to keep the same order
            $.each( parentToChildArray, function( key, value ){
                value.reverse();                 
            });
            // Load matching element for the currently selected option
            if( parentToChildArray[ currentElement.val() ] != undefined ){

                $.each( parentToChildArray[ currentElement.val() ], function( key, value ){
                    $( childSelect ).append( value );                 
                });
                if( childValueEmpty ) {
                    $( childSelect ).prepend( "<option value='' selected></option>")   
                }
            }
            currentElement.data( 'parentToChildArray', parentToChildArray );
            
            // Load matching element in child when value change
            currentElement.change( () => {
                // Remove options on the child select
                $( childSelect + ' option' ).each(function() {
                    $(this).remove();
                });
                $( childSelect ).trigger( 'change' );
                // Add options
                dataArray = $(this).data( 'parentToChildArray' );
                if( dataArray[ $(this).val() ] != undefined ){
                    $.each( dataArray[ $(this).val() ], function( key, value ){
                        $( childSelect ).append( value );                 
                    });
                    if( childValueEmpty ) {
                        $( childSelect ).prepend( "<option value='' selected></option>")   
                    }
                }
            });
        })
    }
}( window.jQuery ));