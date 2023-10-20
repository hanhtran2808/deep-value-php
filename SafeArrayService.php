<?php
class SafeArrayService{

    /**
     * @var array
     */
    private $data;
    
    /**
     * SafeArrayService constructor.
     *
     * @param array $data
     */
    public function __construct( array $data = [] )
    {
        $this->data = $data;
    }
    
    /**
     * @param array $target
     * @param array $indices
     *
     * @return array|mixed|null
     */
    public function safeGet( array $target, $indices )
    {
        $movingTarget = $target;
        
        foreach ( $indices as $index )
        {
            $isArray = is_array( $movingTarget );
            if ( ! $isArray || ! isset( $movingTarget[ $index ] ) ) return NULL;
            
            $movingTarget = $movingTarget[ $index ];
        }
        
        return $movingTarget;
    }
    
    /**
     * @param array $keys
     *
     * @return array|mixed|null
     */
    public function getKeys( array $keys )
    {
        return static::safeGet( $this->data, $keys );
    }
    
    /**
     * <p>Access nested array index values by providing a dot notation access string.</p>
     * <p>Example: $SafeArrayService->get('customer.userInfo.profile') ==
     * $array['customer']['userInfo']['profile']</p>
     *
     * @param $accessString
     *
     * @return array|mixed|null
     */
    public function get( $accessString )
    {
        return $this->getKeys( $this->parseDotNotation( $accessString ) );
    }
    
    /**
     * @param $string
     *
     * @return array
     */
    protected function parseDotNotation( $string )
    {
        return explode( '.', strval( $string ) );
    }
  }