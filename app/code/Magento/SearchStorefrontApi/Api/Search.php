<?php
// Generated by the Magento PHP proto generator.  DO NOT EDIT!

/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

declare(strict_types=1);

namespace Magento\SearchStorefrontApi\Api;

use \Magento\SearchStorefrontApi\Api\Data\ProductSearchRequestInterface;
use \Magento\SearchStorefrontApi\Api\Data\ProductsSearchResultInterface;
use \Magento\SearchStorefrontApi\Proto\ProductSearchRequest;
use \Magento\SearchStorefrontApi\Proto\ProductsSearchResult;
use \Magento\SearchStorefrontApi\Proto\SearchClient;

/**
 * Autogenerated description for Search class
 *
 * @SuppressWarnings(PHPMD)
 */
class Search implements SearchInterface
{
    /**
     * @var SearchClient
     */
    private $protoClient;

    /**
     * @param string      $hostname
     * @param array       $options
     * @param string|null $channel
     */
    public function __construct(
        string $hostname,
        array $options,
        ?string $channel = null
    ) {
        $this->protoClient = new SearchClient($hostname, $options, $channel);
    }

    /**
     * @inheritdoc
     *
     * @param  ProductSearchRequestInterface $request
     * @return ProductsSearchResultInterface
     * @throws \Throwable
     */
    public function searchProducts(ProductSearchRequestInterface $request): ProductsSearchResultInterface
    {
        $protoRequest = $this->searchProductsToProto($request);
        [$protoResult, $status] = $this->protoClient->searchProducts($protoRequest)->wait();
        if ($status->code !== 0) {
            throw new \RuntimeException($status->details, $status->code);
        }
        return $this->searchProductsFromProto($protoResult);
    }

    /**
     * Autogenerated description for searchProducts method
     *
     * @param  ProductSearchRequestInterface $value
     * @return ProductSearchRequest
     */
    private function searchProductsToProto(ProductSearchRequestInterface $value): ProductSearchRequest
    {
        // convert data from \Magento\SearchStorefrontApi\Api\Data\ProductSearchRequest
        // to \Magento\SearchStorefrontApi\Proto\ProductSearchRequest
        /**
 * @var \Magento\SearchStorefrontApi\Api\Data\ProductSearchRequest $value
**/
        $p = function () use ($value) {
            $r = new \Magento\SearchStorefrontApi\Proto\ProductSearchRequest();
            $r->setPhrase($value->getPhrase());
            $r->setStore($value->getStore());
            $r->setPageSize($value->getPageSize());
            $r->setCurrentPage($value->getCurrentPage());
            $res = [];
            foreach ($value->getFilters() as $item5) {
                // convert data from \Magento\SearchStorefrontApi\Api\Data\Filter
                // to \Magento\SearchStorefrontApi\Proto\Filter
                /**
 * @var \Magento\SearchStorefrontApi\Api\Data\Filter $item5
**/
                $p = function () use ($item5) {
                    $r = new \Magento\SearchStorefrontApi\Proto\Filter();
                    $r->setAttribute($item5->getAttribute());
                    $values = [];
                    foreach ($item5->getIn() as $newValue) {
                        $values[] = $newValue;
                    }
                    $r->setIn($values);
                    $r->setEq($item5->getEq());
                    $prop9 = $item5->getRange();
                    if ($prop9 !== null) {
                        // convert data from \Magento\SearchStorefrontApi\Api\Data\SearchRange
                        // to \Magento\SearchStorefrontApi\Proto\SearchRange
                        /**
 * @var \Magento\SearchStorefrontApi\Api\Data\SearchRange $prop9
**/
                        $p = function () use ($prop9) {
                            $r = new \Magento\SearchStorefrontApi\Proto\SearchRange();
                            $r->setFrom($prop9->getFrom());
                            $r->setTo($prop9->getTo());
                            return $r;
                        };
                        $proto = $p();
                        $r->setRange($proto);
                    }
                    return $r;
                };
                $proto = $p();
                $res[] = $proto;
            }
            $r->setFilters($res);
            $res = [];
            foreach ($value->getSort() as $item6) {
                // convert data from \Magento\SearchStorefrontApi\Api\Data\Sort
                // to \Magento\SearchStorefrontApi\Proto\Sort
                /**
 * @var \Magento\SearchStorefrontApi\Api\Data\Sort $item6
**/
                $p = function () use ($item6) {
                    $r = new \Magento\SearchStorefrontApi\Proto\Sort();
                    $r->setAttribute($item6->getAttribute());
                    $r->setDirection($item6->getDirection());
                    return $r;
                };
                $proto = $p();
                $res[] = $proto;
            }
            $r->setSort($res);
            $r->setIncludeAggregations($value->getIncludeAggregations());
            $r->setCustomerGroupId($value->getCustomerGroupId());
            return $r;
        };
        $proto = $p();

        return $proto;
    }

    /**
     * Autogenerated description for searchProducts method
     *
     * @param  ProductsSearchResult $value
     * @return ProductsSearchResultInterface
     * phpcs:disable Generic.Metrics.NestingLevel.TooHigh
     */
    private function searchProductsFromProto(ProductsSearchResult $value): ProductsSearchResultInterface
    {
        // convert data from \Magento\SearchStorefrontApi\Proto\ProductsSearchResult
        // to \Magento\SearchStorefrontApi\Api\Data\ProductsSearchResult
        /**
 * @var \Magento\SearchStorefrontApi\Proto\ProductsSearchResult $value
**/
        $p = function () use ($value) {
            $r = new \Magento\SearchStorefrontApi\Api\Data\ProductsSearchResult();
            $r->setTotalCount($value->getTotalCount());
            $values = [];
            foreach ($value->getItems() as $newValue) {
                $values[] = $newValue;
            }
            $r->setItems($values);
            $res = [];
            foreach ($value->getFacets() as $item3) {
                // convert data from \Magento\SearchStorefrontApi\Proto\Bucket
                // to \Magento\SearchStorefrontApi\Api\Data\Bucket
                /**
 * @var \Magento\SearchStorefrontApi\Proto\Bucket $item3
**/
                $p = function () use ($item3) {
                    $r = new \Magento\SearchStorefrontApi\Api\Data\Bucket();
                    $r->setAttribute($item3->getAttribute());
                    $r->setLabel($item3->getLabel());
                    $r->setCount($item3->getCount());
                    $res = [];
                    foreach ($item3->getOptions() as $item7) {
                        // convert data from \Magento\SearchStorefrontApi\Proto\BucketOption
                        // to \Magento\SearchStorefrontApi\Api\Data\BucketOption
                        /**
 * @var \Magento\SearchStorefrontApi\Proto\BucketOption $item7
**/
                        $p = function () use ($item7) {
                            $r = new \Magento\SearchStorefrontApi\Api\Data\BucketOption();
                            $r->setValue($item7->getValue());
                            $r->setLabel($item7->getLabel());
                            $r->setCount($item7->getCount());
                            return $r;
                        };
                        $out = $p();
                        $res[] = $out;
                    }
                    $r->setOptions($res);
                    return $r;
                };
                $out = $p();
                $res[] = $out;
            }
            $r->setFacets($res);
            $prop4 = $value->getPageInfo();
            if ($prop4 !== null) {
                // convert data from \Magento\SearchStorefrontApi\Proto\SearchResultPageInfo
                // to \Magento\SearchStorefrontApi\Api\Data\SearchResultPageInfo
                /**
 * @var \Magento\SearchStorefrontApi\Proto\SearchResultPageInfo $prop4
**/
                $p = function () use ($prop4) {
                    $r = new \Magento\SearchStorefrontApi\Api\Data\SearchResultPageInfo();
                    $r->setCurrentPage($prop4->getCurrentPage());
                    $r->setPageSize($prop4->getPageSize());
                    $r->setTotalPages($prop4->getTotalPages());
                    return $r;
                };
                $out = $p();
                $r->setPageInfo($out);
            }
            return $r;
        };
        $out = $p();

        return $out;
    }
}