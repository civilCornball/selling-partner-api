<?php

namespace SellingPartnerApi\Seller\ReportsV20210630;

use Saloon\Http\Response;
use SellingPartnerApi\BaseResource;
use SellingPartnerApi\Seller\ReportsV20210630\Dto\CreateReportScheduleSpecification;
use SellingPartnerApi\Seller\ReportsV20210630\Dto\CreateReportSpecification;
use SellingPartnerApi\Seller\ReportsV20210630\Requests\CancelReport;
use SellingPartnerApi\Seller\ReportsV20210630\Requests\CancelReportSchedule;
use SellingPartnerApi\Seller\ReportsV20210630\Requests\CreateReport;
use SellingPartnerApi\Seller\ReportsV20210630\Requests\CreateReportSchedule;
use SellingPartnerApi\Seller\ReportsV20210630\Requests\GetReport;
use SellingPartnerApi\Seller\ReportsV20210630\Requests\GetReportDocument;
use SellingPartnerApi\Seller\ReportsV20210630\Requests\GetReports;
use SellingPartnerApi\Seller\ReportsV20210630\Requests\GetReportSchedule;
use SellingPartnerApi\Seller\ReportsV20210630\Requests\GetReportSchedules;

class Api extends BaseResource
{
    /**
     * @param  array|null  $reportTypes A list of report types used to filter reports. Refer to [Report Type Values](https://developer-docs.amazon.com/sp-api/docs/report-type-values) for more information. When reportTypes is provided, the other filter parameters (processingStatuses, marketplaceIds, createdSince, createdUntil) and pageSize may also be provided. Either reportTypes or nextToken is required.
     * @param  array|null  $processingStatuses A list of processing statuses used to filter reports.
     * @param  array|null  $marketplaceIds A list of marketplace identifiers used to filter reports. The reports returned will match at least one of the marketplaces that you specify.
     * @param  int|null  $pageSize The maximum number of reports to return in a single call.
     * @param  string|null  $createdSince The earliest report creation date and time for reports to include in the response, in ISO 8601 date time format. The default is 90 days ago. Reports are retained for a maximum of 90 days.
     * @param  string|null  $createdUntil The latest report creation date and time for reports to include in the response, in ISO 8601 date time format. The default is now.
     * @param  string|null  $nextToken A string token returned in the response to your previous request. nextToken is returned when the number of results exceeds the specified pageSize value. To get the next page of results, call the getReports operation and include this token as the only parameter. Specifying nextToken with any other parameters will cause the request to fail.
     */
    public function getReports(
        ?array $reportTypes = null,
        ?array $processingStatuses = null,
        ?array $marketplaceIds = null,
        ?int $pageSize = null,
        ?string $createdSince = null,
        ?string $createdUntil = null,
        ?string $nextToken = null,
    ): Response {
        return $this->connector->send(new GetReports($reportTypes, $processingStatuses, $marketplaceIds, $pageSize, $createdSince, $createdUntil, $nextToken));
    }

    /**
     * @param  CreateReportSpecification  $createReportSpecification Information required to create the report.
     */
    public function createReport(CreateReportSpecification $createReportSpecification): Response
    {
        return $this->connector->send(new CreateReport($createReportSpecification));
    }

    /**
     * @param  string  $reportId The identifier for the report. This identifier is unique only in combination with a seller ID.
     */
    public function getReport(string $reportId): Response
    {
        return $this->connector->send(new GetReport($reportId));
    }

    /**
     * @param  string  $reportId The identifier for the report. This identifier is unique only in combination with a seller ID.
     */
    public function cancelReport(string $reportId): Response
    {
        return $this->connector->send(new CancelReport($reportId));
    }

    /**
     * @param  array  $reportTypes A list of report types used to filter report schedules. Refer to [Report Type Values](https://developer-docs.amazon.com/sp-api/docs/report-type-values) for more information.
     */
    public function getReportSchedules(array $reportTypes): Response
    {
        return $this->connector->send(new GetReportSchedules($reportTypes));
    }

    public function createReportSchedule(CreateReportScheduleSpecification $createReportScheduleSpecification): Response
    {
        return $this->connector->send(new CreateReportSchedule($createReportScheduleSpecification));
    }

    /**
     * @param  string  $reportScheduleId The identifier for the report schedule. This identifier is unique only in combination with a seller ID.
     */
    public function getReportSchedule(string $reportScheduleId): Response
    {
        return $this->connector->send(new GetReportSchedule($reportScheduleId));
    }

    /**
     * @param  string  $reportScheduleId The identifier for the report schedule. This identifier is unique only in combination with a seller ID.
     */
    public function cancelReportSchedule(string $reportScheduleId): Response
    {
        return $this->connector->send(new CancelReportSchedule($reportScheduleId));
    }

    /**
     * @param  string  $reportDocumentId The identifier for the report document.
     */
    public function getReportDocument(string $reportDocumentId): Response
    {
        return $this->connector->send(new GetReportDocument($reportDocumentId));
    }
}